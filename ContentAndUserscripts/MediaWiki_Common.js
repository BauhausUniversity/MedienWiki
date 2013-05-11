
/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */
/*

*/
"use strict";

var customizeToolbar = function() {
	console.log("customizeToolbarStarted");
	

 
 $( '#wpTextbox1' ).wikiEditor( 'addToToolbar', {
       'section': 'main',
       'group': 'insert',
       'tools': {
                'mytool': {
                        'label': 'mytool', // or use labelMsg for a localized label, see above
                        'type': 'button',
                        'icon': 'http://upload.wikimedia.org/wikipedia/commons/4/49/Tango_-_text-x-script_22px.png',
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
				html: '<div></div>',
				init: function () {
					console.log("init Started");
				},
				dialog:{
					resizable: false,
					dialogClass: 'wikiEditor-toolbar-dialog',
					width: 590,
					buttons: [
						{
							'text':'insert', 
							'click':function () {
							var fileUse = "yey! teststring";
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
