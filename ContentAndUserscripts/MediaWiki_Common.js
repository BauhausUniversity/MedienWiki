
/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */
/*

*/

function changeToolbar(){
	if($('#wikiEditor-ui-toolbar [title="mytool"]')){//if mytool is activated
		$('#wikiEditor-ui-toolbar [title="Embedded file"]').hide();//hide the normal embed image button
	}
}



$( '#wpTextbox1' ).on( 'wikiEditor-toolbar-doneInitialSections', function () {
	
	
 
 
 $('#wpTextbox1').wikiEditor( 'addToToolbar', {
       'section': 'main',
       'group': 'insert',
       'tools': {
                'mytool': {
                        'label': 'mytool', // or use labelMsg for a localized label, see above
                        'type': 'button',
                        'icon': 'customInsertImage.png', 
                        'action': {
       							'type': 'dialog',
								'module':'mytool'
      	 					}
                }
        }    
 });//END:wikiEditor('addToToolbar


$.wikiEditor.modules.dialogs.modules['mytool'] = {
				titleMsg: 'wikieditor-toolbar-tool-mytool-title',
				id: 'wikieditor-toolbar-mytool-dialog',
				html:'<div id="wikieditor-toolbar-mytool-step1Container"> <!-- what do you want to do wrapper-->\
					<!-- wizard buttons go here-->\
				</div>\
				<div id="wikieditor-toolbar-mytool-step2Container">\
					<div id="wikieditor-toolbar-mytool-recentimagesContainer">\
						<p id="wikieditor-toolbar-mytool-recentimagesContainer-helptext"></p>\
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
							$('<a href="#">use this</a>')
									.button()
									.on('click',(function(imageTitle){ //scoping/closure magic http://stackoverflow.com/questions/8624057/closure-needed-for-binding-event-handlers-within-a-loop
										return function(){
											$(inputID).val('File:'+imageTitle);
										};
									})(imageTitle))
									.appendTo(li);
							$(li).appendTo(domList);
							$(li).prepend('<img src="'+thumbLink+'" '+' width="'+thumbWidth+'"/>'+'<em>'+imageTitle+'</em>');
							
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
				};//modules mytool def
				
				changeToolbar();//change toolbar after button has been inserted
    
} );
