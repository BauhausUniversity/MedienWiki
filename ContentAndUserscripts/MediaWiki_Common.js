
/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */
/*

*/
"use strict";

var customizeToolbar = function() {
	
console.log("customizeToolbarStarted");
	

 
 $('#wpTextbox1').wikiEditor( 'addToToolbar', {
       'section': 'main',
       'group': 'insert',
       'tools': {
                'mytool': {
                        'label': 'mytool', // or use labelMsg for a localized label, see above
                        'type': 'button',
                        'icon': '', //TODO FIXME | seems to help against no-diaglogs-present syndrom. Issue #15 on github.com/BauhausUniversity/MedienWiki/issues
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
					<fieldset>\
						<input type="text" id="wikieditor-toolbar-mytool-inputFilename" name="filename">\
						<label id="wikieditor-toolbar-mytool-lableFilename"for="filename">Filename</label>\
						<input type="text" id="wikieditor-toolbar-mytool-inputCaption" name="caption">\
						<label id="wikieditor-toolbar-mytool-lableCaption"for="caption">Caption</label>\
					</fieldset>\
				</div>',
				init: function () {
					var ailimit_var = 5; //how many item shell be retrieved from the api?
					var inputID ='#wikieditor-toolbar-mytool-inputFilename'; //id of the input field that gets the image name, preceeded by a '#'
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
						var inputToFill=''//ID of the input field here
						var domList = $('<ul>');
						var li;
						var imageTitle='';
						var usethisButton;
						for(var i=0;i<imageArray.length; i++){
							li = $('<li>');
							imageTitle = imageArray[i].name;
							$(li).append('<em>'+imageTitle+'</em>');
							$('<a href="#">use this</a>')
									.button()
									.on('click',(function(imageTitle){ //scoping/closure magic http://stackoverflow.com/questions/8624057/closure-needed-for-binding-event-handlers-within-a-loop
										return function(){
											$(inputID).val('File:'+imageTitle);
										};
									})(imageTitle))
									.appendTo(li);
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
				};//modules mytool def
}; //customize Toolbar







//loader
if ( $.inArray( mw.config.get( 'wgAction' ), ['edit', 'submit'] ) !== -1 ) {
        mw.loader.using( 'user.options', function () {
                if ( mw.user.options.get('usebetatoolbar') ) {
                        mw.loader.using( 'ext.wikiEditor.toolbar', function () {
                                $(document).ready( customizeToolbar );
                        } );
                }
        } );
}
