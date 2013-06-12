
/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */
/*

*/

/*
load needed modules 
 */
mw.loader.load( 'jquery.ui.tabs' );

//actual code
$( '#wpTextbox1' ).on( 'wikiEditor-toolbar-doneInitialSections', function () {

function changeToolbar(){
	/*if($('#wikiEditor-ui-toolbar [title="mytool"]') && $('#wikiEditor-ui-toolbar [title="Embedded file"]')){//if mytool is activated
		$('#wikiEditor-ui-toolbar [title="Embedded file"]').hide();//hide the normal embed image button
	} //probably not needed because  $( '#wpTextbox1' ).wikiEditor( 'removeFromToolbar', { */
	if(!$.wikiEditor.modules.dialogs.modules.mytool){ //that should be not needed anymore since we use  mw.loader.using( ['ext.wikiEditor.dialogs'],function(){  But I am a bit FUD about it. 
		$( '#wpTextbox1' ).wikiEditor( 'addModule', mytool());
		console.log("oha. postLoad of module was needed!");
	}
}



var mytool = function(){
				
				return { dialogs:{
					mytool:{
						titleMsg: 'wikieditor-toolbar-tool-mytool-title',
						id: 'wikieditor-toolbar-mytool-dialog',
						html:'\
							<div id="wikieditor-toolbar-mytool-imageSources">\
								<ul>\
									<li><a href="#wikieditor-toolbar-mytool-imageSources-recentimagesContainer">Recent Uploads</a></li>\
									<li><a href="#wikieditor-toolbar-mytool-imageSources-uploadImage">Upload new Image</a></li>\
								</ul>\
								<div id="wikieditor-toolbar-mytool-imageSources-recentimagesContainer">\
									<p id="wikieditor-toolbar-mytool-imageSources-recentimagesContainer-helptext">Your recent uploads</p>\
									<!-- insert image goes here-->\
								</div>\
								<div id="wikieditor-toolbar-mytool-imageSources-uploadImage">\
									<div>\
										<h2>This is the previous step!</h2>\
									</div>\
									<div id="selectLicense">\
										<h3><input id="selector-radio-license-byme" name="selector-radio-license" type="radio" required>I created this work</h3>\
										<div id="byme">\
											<p>I, <input name="authorname" type="text" size="30" maxlength="30" placeholder="Your Name" pattern="..+" required>, want to release the file`s content under a\
											<select name="license" id="byMe-license">\
											</select>\
											license.\
											</p>\
											<p id="myMe-licenseDescriptor"></p>\
											<div>\
												<h4>I want to provide another license</h4>\
												<div>\
													<input name="customlicense" type="text" size="30" maxlength="30" placeholder="licensename and source of license">\
												</div>\
											</div>\
										</div>\
										<h3> <input id="selector-radio-license-byother" name="selector-radio-license" type="radio" required>Someone else created this work</h3>\
										<div id="byother">\
											I may use this file from the source  <input name="source" type="text" size="30" maxlength="30" placeholder="where did you find the file?" pattern="...+" required> by the author <input name="authorname" type="text" size="30" maxlength="30" placeholder="The authors name">, because it is \
											<select name="license" id="bySomeone-license">\
											</select>\
											<br>\
											Or an other reason: <input name="customlicense" type="text" size="30" maxlength="30" placeholder="provide reason here">\
											<h4>Please note: </h4>\
											<p>Uploading files just because you found them on the web is <em>illegal</em><br>\
											If the file is not legally uploaded, it may be deleted (which looks ugly on the page you use it on)<br>\
											Furthermore if you just took it without being allowed, the author might sue you (Which can cost <em>a lot</em>. Take. It. Serious. We are not kidding.)</p>\
										</div>\
									</div><!--select License end--->\
									<div>\
										<h2>This is the next step!</h2>\
									</div>\
								</div><!--END: wikieditor-toolbar-mytool-imageSources-uploadImage -->\
							</div>\
							\
							<fieldset>\
								<label id="wikieditor-toolbar-mytool-lableFilename"for="filename">Filename</label>\
								<input type="text" id="wikieditor-toolbar-mytool-inputFilename" name="filename">\
								<label id="wikieditor-toolbar-mytool-lableCaption"for="caption">Caption</label>\
								<input type="text" id="wikieditor-toolbar-mytool-inputCaption" name="caption">\
							</fieldset>\
						',
						init: function () {
							//REQUIRES: jquery.ui.tabs
							//Setup tabs for recent uploads and upload image
							$( "#wikieditor-toolbar-mytool-imageSources" ).tabs();
			
							//start highlight upload button
											
							//CONFIG START
							var imageConfig = {
								ailimit:5, //how many items shell be retrieved from the api?
								inputID: '#wikieditor-toolbar-mytool-inputFilename', //id of the input field that gets the image name, preceeded by a '#'
								thumbWidth: 32, //width of the image preview thumbnails 
							}
							//CONFIG END
							console.log("init Started");

							/*Create Wizard behaviour*/
							//attach events and actions to buttons
							//disable/enable dialog buttons

							/*GET LATEST UPLOADS from user, put into array*/
							//get recent images

							//TODO: Ajax should e wrapped in am-I-logged-in check: skip if mw.config.wgUserName
							function generateRecentImagesList(){
								$.ajax({
										url: mw.util.wikiScript( 'api' ),
										dataType: 'json',
										data: {
											'action':'query',
											'format':'json',
											'list':'allimages',
											'ailimit':imageConfig.ailimit, //see above for definition
											'aisort':'timestamp',
											'aidir':'older',
											'aiuser': mw.config.get("wgUserName")
										},
										success:function(data){
											generateList(data);
										}
								});
								
								function generateList(images){
									/*generates several List points*/
									
									//initialize variables for image ist generation
									var imageArray = images.query.allimages; 
									var domList = $('<ul class="wikieditor-toolbar-mytool-recentImagesList">');
									var li;
									var imageTitle='';
									var thumbLink ='';
									var usethisButton;
									//END initialization of variables					
									
														
									for(var i=0;i<imageArray.length; i++){
									   //creates a li for each image in array
										li = $('<li>');
										imageTitle = imageArray[i].name;
										thumbLink = window.wgServer+window.wgScriptPath+'/thumb.php'+'?f='+imageTitle+'&w='+imageConfig.thumbWidth; //link to thumb.php, generating and returning a thumb on request. parameters: f=filename, w=imagewidth
										$(li).append('<img src="'+thumbLink+'" '+' width="'+imageConfig.thumbWidth+'"/>'+'<em>'+imageTitle+'</em>');
										$('<a href="#">use this</a>') //create a button which on click...
											.button()
											.on('click',(function(imageTitle){ //scoping/closure magic http://stackoverflow.com/questions/8624057/closure-needed-for-binding-event-handlers-within-a-loop
												return function(){
													$(imageConfig.inputID).val('File:'+imageTitle); //changes the value of the input field to the filename of the image-list-item clicked on. 
												};
											})(imageTitle))
											.prependTo(li);
										$(li).appendTo(domList);
									}//END for
									
									$(domList).appendTo('#wikieditor-toolbar-mytool-imageSources-recentimagesContainer');//append the list of images to the dialog-box 
								}//end generateList()								
							}
							

							

							/*WRITE LATEST UPLOADS*/
							//for loop. generate [{},{},…] {} contains: title, evtl image link to thumbnail

							//generate text:li + evtl. preview + image name+ button
							//attach click-event for writing the value of #wikieditor-toolbar-mytool-inputFilename

						},
						dialog:{
							resizable: false,
							dialogClass: 'wikiEditor-toolbar-dialog',
							width: 590,
							buttons:
							[
								{
									'text':'insert', 
									'click':function () {
									var fileUse = $(this).find('#wikieditor-toolbar-mytool-inputFilename').val();
									$( this ).dialog( 'close' );
									$.wikiEditor.modules.toolbar.fn.doAction(
											$( this ).data( 'context' ),
											{
												type: 'replace',
												options: {
													pre: '[[',
													peri: fileUse,
													post: ']]',
													ownline: true
												}
											},
											$( this )
										);
									}//click function
								},//text/click object
								{
									'text':'cancel',
									'click': function () {
										$( this ).dialog( 'close' );
									}
								}
							],
							open: function () {
								console.log("open!");
								//



								}
							}
						}//end mytool
					}//end dialogs
					};//end return object
				};//modules mytool def
				
				
				//FIXME: If the button appears but there is no function on clicking 
				//you can reexecute `$( '#wpTextbox1' ).wikiEditor( 'addModule', mytool());` 
				//whereas mytool is a function which returns a module object. 
				
				mw.loader.using( ['ext.wikiEditor.dialogs'],function(){ //the usual dialogs sould be initialized first
					$( '#wpTextbox1' ).wikiEditor( 'addModule', mytool());
					$('#wpTextbox1').wikiEditor( 'addToToolbar', {
				'section': 'main',
				'group': 'insert',
				'tools': {
						 'mytool': {
								 'label': 'insert Image', // or use labelMsg for a localized label, see above
								 'type': 'button',
								 'icon': 'customInsertImage.png', 
								 'action': {
										 'type': 'dialog',
										 'module':'mytool'
									 }
						 }
				 }
				});//END:wikiEditor('addToToolbar
				
				$( '#wpTextbox1' ).wikiEditor( 'removeFromToolbar', {
					'section': 'main',
					'group': 'insert',
					 'tool': 'insert-file'
					});
				
				}, function(){console.log("error initializing editor config");});
		
				
				
				window.setTimeout(changeToolbar, 500); //change toolbar after button has been inserted

});
