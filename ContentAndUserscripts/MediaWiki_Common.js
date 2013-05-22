
/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */
/*

*/




$( '#wpTextbox1' ).on( 'wikiEditor-toolbar-doneInitialSections', function () {

function changeToolbar(){
	if($('#wikiEditor-ui-toolbar [title="mytool"]') && $('#wikiEditor-ui-toolbar [title="Embedded file"]')){//if mytool is activated
		$('#wikiEditor-ui-toolbar [title="Embedded file"]').hide();//hide the normal embed image button
	}
	if(!$.wikiEditor.modules.dialogs.modules.mytool){
		$( '#wpTextbox1' ).wikiEditor( 'addModule', mytool());
		console.log("oha. postLoad of module was needed!")
	}
}



var mytool = function(){
				
				return { dialogs:{
					mytool:{
						titleMsg: 'wikieditor-toolbar-tool-mytool-title',
						id: 'wikieditor-toolbar-mytool-dialog',
						html:'<div id="wikieditor-toolbar-mytool-step1Container"> <!-- what do you want to do wrapper-->\
							<!-- wizard buttons go here-->\
						</div>\
						<div id="wikieditor-toolbar-mytool-step2Container">\
							<p id="wikieditor-toolbar-mytool-step2Container-helptext">To use an image, please upload it first (show <span href="#" class="wikieditor-toolbar-mytool-highlightUploadButton">upload button</span>) <br> or create put in a filename, save the page and click the link you created to upload the picture</p>\
							<div id="wikieditor-toolbar-mytool-recentimagesContainer">\
								<p id="wikieditor-toolbar-mytool-recentimagesContainer-helptext">Your recent uploads</p>\
								<!-- insert image goes here-->\
							</div>\
							<div id="wikieditor-toolbar-mytool-generatelinktext-container">\
							<p id="id="wikieditor-toolbar-mytool-generatelinktext-container-helptext">\
							 <!--a text with: "try uploading first, its easier!" and "you can generate a upload link, it will..." -->\
							</p>\
							</div>\
							<hr>\
							<fieldset>\
								<label id="wikieditor-toolbar-mytool-lableFilename"for="filename">Filename</label>\
								<input type="text" id="wikieditor-toolbar-mytool-inputFilename" name="filename">\
								<label id="wikieditor-toolbar-mytool-lableCaption"for="caption">Caption</label>\
								<input type="text" id="wikieditor-toolbar-mytool-inputCaption" name="caption">\
							</fieldset>\
						</div>',
						init: function () {
							//start highlight upload button
							$('.wikieditor-toolbar-mytool-highlightUploadButton').on('click',function(e){
								var oldOpacity = $('.ui-widget-overlay').css("opacity")
								$('.ui-widget-overlay')
								.animate({"opacity": 0.2},50, function(){
									$('li#t-upload a')
								.animate({"margin-left": "+=5px"}, 200)
								.animate({"margin-left": "-=5px"}, 100)
								.animate({"margin-left": "+=35px"}, 100)
								.animate({"margin-left": "-=35px"}, 100)
								.animate({"margin-left": "+=20px"}, 150)
								.animate({"margin-left": "-=20px"}, 150, function(){
									$('.ui-widget-overlay').animate({"opacity": oldOpacity},200);})
								});
							}) ;
							
							//highlight uploadbutton end
							
							//CONFIG START
							var ailimit_var = 5; //how many items shell be retrieved from the api?
							var inputID ='#wikieditor-toolbar-mytool-inputFilename'; //id of the input field that gets the image name, preceeded by a '#'
							var thumbWidth = 32; //width of the image preview thumbnails 
							//CONFIG END


							console.log("init Started");

							/*Create Wizard behaviour*/
							//attach events and actions to buttons
							//disable/enable dialog buttons

							/*GET LATEST UPLOADS from user, put into array*/
							//get recent images

							//TODO: Ajax should e wrapped in am-I-logged-in check: skip if mw.config.wgUserName
							$.ajax( {
										url: mw.util.wikiScript( 'api' ),
										dataType: 'json',
										data: {
											'action':'query',
											'format':'json',
											'list':'allimages',
											'ailimit':ailimit_var, //see above for definition
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

								var imageArray = images.query.allimages; 
								var domList = $('<ul class="wikieditor-toolbar-mytool-recentImagesList">');
								var li;
								var imageTitle='';
								var thumbLink ='';
								var usethisButton;
								
								for(var i=0;i<imageArray.length; i++){
									li = $('<li>');
									imageTitle = imageArray[i].name;
									thumbLink = window.wgServer+window.wgScriptPath+'/thumb.php'+'?f='+imageTitle+'&w='+thumbWidth; //link to thumb.php, generating and returning a thumb on request. parameters: f=filename, w=imagewidth
									$(li).append('<img src="'+thumbLink+'" '+' width="'+thumbWidth+'"/>'+'<em>'+imageTitle+'</em>');
									$('<a href="#">use this</a>')
										.button()
										.on('click',(function(imageTitle){ //scoping/closure magic http://stackoverflow.com/questions/8624057/closure-needed-for-binding-event-handlers-within-a-loop
											return function(){
												$(inputID).val('File:'+imageTitle);
											};
										})(imageTitle))
										.prependTo(li);
									$(li).appendTo(domList);
								}//END for
								$(domList).appendTo('#wikieditor-toolbar-mytool-recentimagesContainer');
							}//end generateList()

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
				
				window.setTimeout(changeToolbar, 500); //change toolbar after button has been inserted

} );
