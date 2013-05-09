/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */
/*

*/



var customizeToolbar = function() {
	$( '#wpTextbox1').wikiEditor('addModule',{
	'dialogs':{
	'insert-mytool': {
				titleMsg: 'wikieditor-toolbar-tool-mytool-title',
				id: 'wikieditor-toolbar-mytool-dialog',
				html: '\
					<fieldset>\
						<div class="wikieditor-toolbar-field-wrapper">\
							<label for="wikieditor-toolbar-file-target" rel="wikieditor-toolbar-file-target" id="wikieditor-toolbar-tool-file-target-label"></label>\
							<input type="text" id="wikieditor-toolbar-file-target"/>\
						</div>\
						<div class="wikieditor-toolbar-field-wrapper">\
							<label for="wikieditor-toolbar-file-caption" rel="wikieditor-toolbar-file-caption"></label>\
							<input type="text" id="wikieditor-toolbar-file-caption"/>\
						</div>\
						<div class="wikieditor-toolbar-file-options">\
							<div class="wikieditor-toolbar-field-wrapper">\
								<label for="wikieditor-toolbar-file-size" rel="wikieditor-toolbar-file-size"></label><br/>\
								<input type="text" id="wikieditor-toolbar-file-size" size="5"/>\
							</div>\
							<div class="wikieditor-toolbar-field-wrapper">\
								<label for="wikieditor-toolbar-file-float" rel="wikieditor-toolbar-file-float"></label><br/>\
								<select type="text" id="wikieditor-toolbar-file-float">\
								<option value="default" selected="selected" rel="wikieditor-toolbar-file-default"></option>\
								<option data-i18n-magic="img_none"></option>\
								<option data-i18n-magic="img_center"></option>\
								<option data-i18n-magic="img_left"></option>\
								<option data-i18n-magic="img_right"></option>\
								</select>\
							</div>\
							<div class="wikieditor-toolbar-field-wrapper">\
								<label for="wikieditor-toolbar-file-format" rel="wikieditor-toolbar-file-format"></label><br/>\
								<select type="text" id="wikieditor-toolbar-file-format">\
								<option selected="selected" data-i18n-magic="img_thumbnail">thumb</option>\
								<option data-i18n-magic="img_framed"></option>\
								<option data-i18n-magic="img_frameless"></option>\
								<option value="default" rel="wikieditor-toolbar-file-format-none"></option>\
								</select>\
							</div>\
						</div>\
					</fieldset>',
				init: function () {
window.alert("hi!")
				},
				dialog: {
					resizable: false,
					dialogClass: 'wikiEditor-toolbar-dialog',
					width: 590,
					buttons: {
						'wikieditor-toolbar-tool-mytool-insert': function () {
							var fileName, caption, fileFloat, fileFormat, fileSize, fileTitle,
								options, fileUse,
								hasPxRgx = /.+px$/;
							fileName = $( '#wikieditor-toolbar-file-target' ).val();
							caption = $( '#wikieditor-toolbar-file-caption' ).val();
							fileFloat = $( '#wikieditor-toolbar-file-float' ).val();
							fileFormat = $( '#wikieditor-toolbar-file-format' ).val();
							fileSize = $( '#wikieditor-toolbar-file-size' ).val();
							// Append px to end to size if not already contains it
							if ( fileSize !== '' && !hasPxRgx.test( fileSize ) ) {
								fileSize += 'px';
							}
							if ( fileName !== '' ) {
								fileTitle = new mw.Title( fileName );
								// Append file namespace prefix to filename if not already contains it
								if ( fileTitle.getNamespaceId() !== 6 ){
									fileTitle = new mw.Title( fileName, 6 );
								}
								fileName = fileTitle.toText();
							}
							options = [ fileSize, fileFormat, fileFloat ];
							// Filter empty values
							options = $.grep( options, function ( val ) {
								return val.length && val !== 'default';
							} );
							if ( caption.length ) {
								options.push( caption );
							}
							fileUse = options.length === 0 ? fileName : ( fileName + '|' + options.join( '|' ) );
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

							// Restore form state
							$( ['#wikieditor-toolbar-file-target',
								'#wikieditor-toolbar-file-caption',
								'#wikieditor-toolbar-file-size',
								'#wikieditor-toolbar-file-float',
								'#wikieditor-toolbar-file-format'].join( ',' )
							).val( '' );
						},
						'wikieditor-toolbar-tool-mytool-cancel': function () {
							$( this ).dialog( 'close' );
						}
					},
					open: function () {
						$( '#wikieditor-toolbar-file-target' ).focus();
						if ( !( $( this ).data( 'dialogkeypressset' ) ) ) {
							$( this ).data( 'dialogkeypressset', true );
							// Execute the action associated with the first button
							// when the user presses Enter
							$( this ).closest( '.ui-dialog' ).keypress( function( e ) {
								if ( e.which === 13 ) {
									var button = $( this ).data( 'dialogaction' ) ||
										$( this ).find( 'button:first' );
									button.click();
									e.preventDefault();
								}
							});

							// Make tabbing to a button and pressing
							// Enter do what people expect
							$( this ).closest( '.ui-dialog' ).find( 'button' ).focus( function() {
								$( this ).closest( '.ui-dialog' ).data( 'dialogaction', this );
							});
						}
					}
				}
			}
	}//end "dialogs:"
}

)//end addmodule



	//a test addition. It does add a :) in order to make discussions in tough editwars way nicer.
    $( '#wpTextbox1' ).wikiEditor('addToToolbar',{
       'section': 'main',
       'group': 'insert',
       'tools': {
                'smile': {
                        label: 'Smile!', // or use labelMsg for a localized label, see above
                        type: 'button',
                        icon: '//upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Gnome-face-smile.svg/22px-Gnome-face-smile.svg.png',
                        action: {
                                type: 'encapsulate',
                                options: {
                                        pre: ":)" // text to be inserted
                                }    
                        }
                }
        }
        
        
 });//END:wikiEditor('addToToolbar
 
 
 $( '#wpTextbox1' ).wikiEditor( 'addToToolbar', {
       'section': 'main',
       'group': 'insert',
       'tools': {
                'mytool': {
                        label: 'mytool!', // or use labelMsg for a localized label, see above
                        type: 'button',
                        icon: 'http://upload.wikimedia.org/wikipedia/commons/4/49/Tango_-_text-x-script_22px.png',
                        module:'mytool'
                }
        }
        
        
 });//END:wikiEditor('addToToolbar
};







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
