
/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */


/*
PLANNED STRUCTURE
# on ready:  
## Setup calling of dialog
- register button in Sidebar
- register callback button in editor
- load jqueryUI 

##On calling of dialog 
### Setup Dialog 
- Check if the editor is open by looking for id and type and visibility (precaution, if it is in dom but not used. Check this considering the visual editor). One *could* look for the editor javascript too, but as the insertion of text to the textarea is not dependend on the editor it is probalby useless complication.dialogHTML

- If yes. Setup Text Insertion: Include the "insert" and "close" buttons, the "recently used" tab, the image attributes form elements and set up the insert at button functionality
- if no, hide insert button, the image attributes form elements and the recently used tab. 

Do all the usual  setup. 

*/




var gogogo = function(){
	var dialogDOM = {
		$dialog: $("<div/>").dialog({ autoOpen: false, width:500, title:"insert or upload image" }),
		$tabs: $("<div/>").html('<ul>\
				<li id="wikieditor-toolbar-visualUploaderTool--imageSources-recentimagesContainer-tab"><a href="#wikieditor-toolbar-visualUploaderTool-imageSources-recentimagesContainer">Recent Uploads</a></li>\
				<li id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-tab"><a href="#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage">Upload new Image</a></li>\
			</ul>\
			<div id="wikieditor-toolbar-visualUploaderTool-imageSources-recentimagesContainer">\
				<p id="wikieditor-toolbar-visualUploaderTool-imageSources-recentimagesContainer-helptext">Your recent uploads</p>\
				<!-- insert image goes here-->\
			</div>\
			<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage">\
				<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectFile">\
					<h2>Step 1 of 4: Choose a file!</h2>\
					<input type="file" id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-fileselect" name="files[]" required/>\
					<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filePreview"></div>\
					<p id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-uploadImage-status" class="wikieditor-toolbar-visualUploaderTool-statusmessage"></p>\
				</div>\
				<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense">\
					<h2>Step 2 of 4: select a License</h2>\
					<h3><input id="selector-radio-license-byme" name="selector-radio-license" type="radio" required>I created this work</h3>\
					<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byme">\
						<p>I, <input name="authorname" type="text" size="30" maxlength="30" placeholder="Your Name" pattern="..+" required>, want to release the file`s content under a\
						<select name="license" id="byMe-license">\
						</select>\
						license.\
						</p>\
						<p id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byme-licenseDescription" class="wikieditor-toolbar-visualUploaderTool-statusmessage"></p>\
						<div>\
							<h4><input type="checkbox"\> I want to provide another license</h4>\
							<div>\
								<input name="customlicense" type="text" size="30" maxlength="30" placeholder="licensename and source of license">\
							</div>\
						</div>\
					</div>\
					<h3> <input id="selector-radio-license-byother" name="selector-radio-license" type="radio" required>Someone else created this work</h3>\
					<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byother">\
						I may use this file from the source  <input name="source" type="text" size="30" maxlength="30" placeholder="where did you find the file?" pattern="...+" required> by the author <input name="authorname" type="text" size="30" maxlength="30" placeholder="The authors name">, because it is \
						<select name="license" id="bySomeone-license">\
						</select>\
						<p id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byother-licenseDescription" class="wikieditor-toolbar-visualUploaderTool-statusmessage"></p>\
						<br>\
						Or an other reason: <input name="customlicense" type="text" size="30" maxlength="30" placeholder="provide reason here">\
						<h4>Please note: </h4>\
						<p>Uploading files just because you found them on the web is <em>illegal</em><br>\
						If the file is not legally uploaded, it may be deleted (which looks ugly on the page you use it on)<br>\
						Furthermore if you just took it without being allowed, the author might sue you (Which can cost <em>a lot</em>. Take. It. Serious. We are not kidding.)</p>\
					</div>\
				</div><!--select License end--->\
				<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filemetadata">\
					<h2>Step 3 of 4: Name the file</h2>\
					<input name="filename" type="text" size="30" maxlength="30" placeholder="what should the name of the file be?">\
					<p id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filemetadata-filenamecheck" class="wikieditor-toolbar-visualUploaderTool-statusmessage"></p>\
				</div>\
				<div id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-usefile">\
					<h2>4: Final Step: Use the file</h2>\
					<p id="wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-finished-hints" class="wikieditor-toolbar-visualUploaderTool-statusmessage"></p>\
					<!--<p>You can now use the file in your article by clicking on "insert</p>-->\
				</div>\
			</div><!--END: wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage -->').tabs(),
		$propertiesToInsert: $("<fieldset/>").html('<div>\
			<label id="wikieditor-toolbar-visualUploaderTool-lableFilename"for="filename">Filename</label>\
			<input type="text" id="wikieditor-toolbar-visualUploaderTool-inputFilename" name="filename">\
			</div>\
			<div>\
			<label id="wikieditor-toolbar-visualUploaderTool-lableCaption"for="caption">Text below Image</label>\
			<input type="text" id="wikieditor-toolbar-visualUploaderTool-inputCaption" name="caption">\
			</div>\
			<div>\
			<label id="wikieditor-toolbar-visualUploaderTool-lableSize" for="size">Size (in pixels)</label>\
			<input type="text" id="wikieditor-toolbar-visualUploaderTool-inputSize" name="size">\
			</div>\
			<div>\
			Show as thumbnail?\
			<input type="checkbox" id="wikieditor-toolbar-visualUploaderTool-inputThumb" name="thumb" value="thumb">\
			</div>')
	};
	
$.dialogDOM=dialogDOM; //delete only for debugging
	
	var configUploadDialog = { //was imageInsertConfig
			ailimit:5, //how many items shell be retrieved from the api?
			inputID: '#wikieditor-toolbar-visualUploaderTool-inputFilename', //id of the input field that gets the image name, preceeded by a '#'
			thumbWidth: 32, //width of the image preview thumbnails ,
			notValidClass:"invalid",
			validClass:"valid",
			othersWorkReasons:{
				'BYSA':{
					shortdesc:"CC attribution, share alike, Non-Commerical",
					longdesc:"this license allows you the by sa nc stuff",
					identifier:"BYSA",
					linkToText:"http://creativecommons.com"
				},
				'dead':{
					shortdesc:"Author is dead since >70 years",
					longdesc:"boha, it gets ,longer each time",
					linkToText:"https://de.wikipedia.org/wiki/Urheberrecht"
				},
				'CC0':{
					shortdesc:"CC0: Allow others to do anything",
					longdesc:"this license allows everything, its like 'public domain'",
					identifier:"CC0",
					linkToText:"http://creativecommons.com"
				}
			},
			ownWorkLicenses:{
				'BYSA':{
					shortdesc:"CC attribution, share alike, Non-Commerical",
					longdesc:"this license allows you the by sa nc stuff",
					identifier:"BYSA",
					linkToText:"http://creativecommons.com"
				},
				'Copyright':{
					shortdesc:"Normal Copyright. Forbid uses for others",
					longdesc:"this license usually sucks",
					identifier:"Copyright",
					linkToText:"https://de.wikipedia.org/wiki/Urheberrecht"
				},
				'CC0':{
					shortdesc:"CC0: Allow others to do anything",
					longdesc:"this license allows everything, its like 'public domain'",
					identifier:"CC0",
					linkToText:"http://creativecommons.com"
				}
			}
		};
	
	(function(){
		//creates the full fledged dialog with all functionality. Useless functionalty will be disabled when not needed in the callDialog function
		//TODO: clean up, set proper DOM references (less IDs more direct references to the dialogDOM-Properties
		var uploadFunctions = {
		initEditorButton:function(){
			//adds a button the the wiki editor which calls the upload dialog. 
			$('#wpTextbox1').wikiEditor( 'addToToolbar', {
				'section': 'main',
				'group': 'insert',
				'tools': {
					 'visualUploaderTool': {
						 'label': 'insert Image', // or use labelMsg for a localized label, see above
						 'type': 'button',
						 'icon': 'customInsertImage.png', 
						 'action': {
							type: 'callback',
							execute: function(context){
								uploadFunctions.callDialog("recent");
							}
						}
					 }
				 }
			});//END:wikiEditor('addToToolbar
			
			$( '#wpTextbox1' ).wikiEditor( 'removeFromToolbar', {
					'section': 'main',
					'group': 'insert',
					'tool': 'file'
			});//end remove from toolbar
		},
		initSidebarButton:function(){
			//create button
			$("<div class='portal persistent'><button>upload file</button></div>").click(function(){
				console.log("called!");
				uploadFunctions.callDialog("upload");
			}).insertAfter("#p-navigation");
		},
		callDialog:function(state){
			console.log("state:",state);
		//state can demand a specific configuration for the dialog. Otherwise we use heuristics. 
		//create variables with the functional areas of the dialog.
		//gets state. can be "upload", "recent"
		
		//check: What does state say? 
		//if: "insert" activate "recent" tab
		dialogDOM.$tabs.tabs("enable"); //sort of reset, so all functions can expect a clean state
			console.log("state:",state);
		if(state=="recent"){
			dialogDOM.$tabs.tabs("select",0); //activates the 1st tab (insert recent image);  will be (for more recent): "active"
		}
		
		//if "upload" activate uplaod tab
		if(state=="upload"){
			dialogDOM.$tabs.tabs("select",1); //activates the 2nd tab (upload). will be (for more recent): "active"
			//dialogDOM.$tabs.tabs("option","disabled",[0]); //will be (for more recent) "disable"
		}
		
		
		//SET BUTTONS HERE, use $( ".selector" ).dialog( "option", "buttons", [ { text: "Ok", click: callbackFunctionname } ] ); http://api.jqueryui.com/dialog/#option-buttons
		
		dialogDOM.$propertiesToInsert.hide(); //resent: don't assume editor presence by default
		if($("textarea#wpTextbox1").length !== 0){ //#wpTextbox1 is the id of the wiki-editor's textarea
			dialogDOM.$propertiesToInsert.show();
			
			//create buttons to insert the text.
			dialogDOM.$dialog.dialog({ 
				buttons: [ 
					{
						text:"Insert Image",
						click:function(){
							window.setTimeout(uploadFunctions.insertTextToEditor, 300);//the timeout is here for a usability reason: If something changes rapidly, the attention focuses there. But if the dialog closes all changes on the screen and where the text was inserted is invisible. 
							$( this ).dialog( "close" );
						}
					},
					{ 
						text: "Close",
						click: function() {
							$( this ).dialog( "close" );
						} 
					}
				] 
			});
		}else{
			dialogDOM.$dialog.dialog({ 
				buttons: [ 
					{ 
						text: "Close",
						click: function() {
							$( this ).dialog( "close" );
						} 
					}
				] 
			});
		}
		dialogDOM.$dialog.dialog( "open" );
		//if editor is present: activate "insert Image"
		//if editor is not present hide "insert Image" Button
	},
		//and some text snippets so we can generate a suitable template with and without "recent uploads" and the like by concatinating strings
		userData: {
			file:null,
			filekey:null
		},
		resetUploadForm: function(container){
			//resets form values inside container; Typically called before dialog is opened or after it is closed.

			//deletes all values from input fields
			container.find('input').each(function(){
				$(this).val("").change();
				$(this).removeClass("valid");
			});//each end

			$('#wikieditor-toolbar-visualUploaderTool-dialog fieldset input').val(""); //reset filename etc.

			container.find('	.wikieditor-toolbar-visualUploaderTool-statusmessage').text(""); //find all dynamic hints

			//set wizard container to first element
			container.children("div").each(function(index,element){
				if(index===0){
					$(element).css("display","block");
				}else{
					$(element).css("display","none");
				}

			});

			//if the button was disabled in constraintsUploadElements()…
			$("wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-usefile .wizardify-backward").removeProp('disabled');

			//remove previewImage
			$('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage').css("background-image","none");

		},//function reset Upload end,
		createRecentImagesList:function(){
			$.ajax({ 
				url: mw.util.wikiScript( 'api' ),
				dataType: 'json',
				data: {
					'action':'query',
					'format':'json',
					'list':'allimages',
					'ailimit':configUploadDialog.ailimit, //see above for definition
					'aisort':'timestamp',
					'aidir':'older',
					'aiuser': mw.config.get("wgUserName")
				},
				success:function(images){
					/*generates several List points*/
					//remove current list
					$('#wikieditor-toolbar-visualUploaderTool-imageSources-recentimagesContainer').children('ul').remove();
					//initialize variables for image ist generation
					if(images.query===undefined || images.query.allimages.length===0){ //nothing in the query, cause no images on the wiki or the like.
						$('#wikieditor-toolbar-visualUploaderTool-imageSources-recentimagesContainer').append($("<ul><li>there are no recently uploaded images from you</li><ul>")); //in <ul> so it is removed
						return;
					}

					var imageArray = images.query.allimages//if no images have been uploaded, the
					var domList = $('<ul class="wikieditor-toolbar-visualUploaderTool-recentImagesList">');
					var li;
					var imageTitle='';
					var thumbLink ='';
					var usethisButton;
					//END initialization of variables
					
					console.log("images",images)

					for(var i=0;i<imageArray.length; i++){
						 //creates a li for each image in array
						li = $('<li>');
						imageTitle = imageArray[i].name;
						thumbLink = window.wgServer+window.wgScriptPath+'/thumb.php'+'?f='+imageTitle+'&w='+configUploadDialog.thumbWidth; //link to thumb.php, generating and returning a thumb on request. parameters: f=filename, w=imagewidth
						$(li).append('<img src="'+thumbLink+'" '+' width="'+configUploadDialog.thumbWidth+'"/>'+'<em>'+imageTitle+'</em>');
						$(li).children("img").error(function(){
							$(this).attr("width","0");//hides the image if retrieving the thumb was unsuccesful. Happens e.g. if the requested size was smaller than the original image. 
						})
						$('<a href="#">use this</a>') //create a button which on click...
							.button()
							.on('click',(function(imageTitle){ //scoping/closure magic http://stackoverflow.com/questions/8624057/closure-needed-for-binding-event-handlers-within-a-loop
								return function(){
									$(configUploadDialog.inputID).val(imageTitle); //changes the value of the input field to the filename of the image-list-item clicked on. 
								};
							})(imageTitle))
							.prependTo(li);
						$(li).appendTo(domList);
					}//END for
					$(domList).appendTo('#wikieditor-toolbar-visualUploaderTool-imageSources-recentimagesContainer').addClass("recentImagesList");//append the list of images to the dialog-box 
				}
			})
		},//end generateList()
		wizardify:function(parameters){
			/* PARAMETERS: rootElementID: String; 
			 * SHORTDESC: Creates a simple wizard. single steps are <div> nested in another div, which is the Root element
			 */
			var config= {
				backbuttonText: parameters.backbuttonText||'< back',
				forwardbuttonText:parameters.forwardbuttonText || 'forward >',
				rootElement: parameters.rootElement,
				endFunction:parameters.endFunction,
				cssClassForwardButton:'wizardify-forward',
				cssClassBackwardButton:'wizardify-backward',
				//currently disabled: 
				forwardButtonTexts: { //if the id matches the hash key of the current container, the forward button. If there is no such container in the html or later bing created, clean up the entry if you like
							"wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectFile":"choose this file",
					}
				//checkingFunctions:parameters.checkingFunctions//the checking functions are functions that are executed before the page is turned. The array consists of subobject containing an ID-selector and a function. If that returns false the turn is not done.
			};

			var wizardStepContainers = config.rootElement.children();
					//set the first step to visible, hide the others
			wizardStepContainers.css('display','none'); //hide all
			wizardStepContainers.filter(':first').css('display','block');//show first

			//insert buttons
			//var wizardStepContainersNoLast = wizardStepContainers.not(':last');
			//var wizardStepContainersLast = wizardStepContainers.filter(':last');

			wizardStepContainers.each(function(index){
				$(this).append('<div class="wizardify-buttonset">');

				var currentElementID = $(this).attr("id");

				if(index>0){
					$('<button/>',{
						'text':config.backbuttonText,
						'class':config.cssClassBackwardButton
					}).click(function(){
						wizardStepContainers.eq(index).css('display','none');
						wizardStepContainers.eq(index-1).css('display','block');
					}).appendTo(wizardStepContainers.eq(index).children('.wizardify-buttonset'));
				}
				if(index<wizardStepContainers.length-1){ //the last one gets a special button, so index-1
					$('<button/>',{
						'text': config.forwardbuttonText, // config.forwardButtonTexts[currentElementID] ? config.forwardButtonTexts[currentElementID] : config.forwardbuttonText,
						'class':config.cssClassForwardButton
					}).click(function(){
						/*if(currentCheckfunction||currentCheckfunction()!== false){ //if the function is existend and after executing it, it returns false, dont "turn the page""
							return; 
						}*/
						wizardStepContainers.eq(index).css('display','none');
						wizardStepContainers.eq(index+1).css('display','block');
					}).appendTo(wizardStepContainers.eq(index).children('.wizardify-buttonset'));
				}
				if(index===wizardStepContainers.length-1){
					/*$('<button/>',{
						'text':config.forwardbuttonText,
						'class':config.cssClassForwardButton
					}).click(config.endFunction).appendTo(wizardStepContainers.eq(index).children('.wizardify-buttonset'));*/
				}
			});
		},
		makeCollapse:function(signifierSelector,rootElementSelector,configParam){
			//signifierselector: the element that says displayed and acts as a kind of button for opening the associated element. The associated element is the .next() one to it.
			//root ElementSelector The element to which the elements to be hidden/shown are children
			//configParam: JSON object. Contains: disableRequired: true/false for disabeling "required" for hidden form elements
			var config = {
				signifierSelector:signifierSelector || 'h3',
				rootElementSelector:rootElementSelector,
				disableRequired: configParam.disableRequired
			};

			var rootElement = $(config.rootElementSelector);

			var currentlyOpen = {
				container:null,
				headline:null
			}; 

			var elementsToCollapse= rootElement.find(config.signifierSelector);
			var relatedContainer; //the container for a headline

			if(elementsToCollapse.length===1){

				relatedContainer=$(elementsToCollapse[0]).next('div');
				relatedContainer.css("display","none");//hide container

				$(elementsToCollapse[0]).click(function(){
					if(relatedContainer.css("display")==="block"){
						relatedContainer.css("display","none");
						$(elementsToCollapse[0]).children('input').prop('checked',false).change();
					}else{
						relatedContainer.css("display","block");
						$(elementsToCollapse[0]).children('input').prop('checked',true).change();
					}
				});
			}else{
				elementsToCollapse.each(function(index){
					var relatedContainer=$(this).next('div'); //selects the following element
					relatedContainer.hide();
					if(config.disableRequired){
						$(relatedContainer).
							find("[required]").
							attr('data-collapse-required-disabled','true').
								removeProp('required');
					}

					$(this).click(function(event){
						console.log('rcon:', relatedContainer, currentlyOpen);

						if(currentlyOpen.container){
							$(currentlyOpen.container).css("display","none");

							if(config.disableRequired){
							//remove all required and turn them into "data-collapse-required-disabled="true"";
								$(currentlyOpen.container).
									find("[required]").
									attr('data-collapse-required-disabled','true').
									removeProp('required');	
							}

							$(currentlyOpen.headline).removeClass('makeCollapse-open');
							$(currentlyOpen.headline).children('input:radio').prop('checked',false).change();
						}

						relatedContainer.css("display","block");
						$(this).addClass('makeCollapse-open');
						//reattach all required attributes when reopened
						if(config.disableRequired){
							//reattach all required  elements with ("data-collapse-required-disabled="true");
							relatedContainer.
								find("[data-collapse-required-disabled]").
								removeAttr('data-collapse-required-disabled').
								prop('required',true);
						}


						currentlyOpen.container = relatedContainer;
						currentlyOpen.headline = this;
						console.log(this,' ', $(this).children('input:radio'));

						$(this).children('input:radio').prop('checked',true).change();//dunno why but if it is not the last line, it fails the following ones.
					});
				});
			}//end else
		}, //end make collapse,
		validateFormPart:function(forwardButtonSelector, formcontainerSelector){
			//Description: Activates/Deactivates the forward-button dependend on the :invalid pseudoclass
			//formcontainerSelector: the selector for the container of the elements (a div e.g.)
			//forwardButtonSelector: the selector of the forward-Button from the 
			//dependend elements, [[dependendA1,dependendA2],[dependendB1,dependendB2]]... so elements of which one needs to have a value are in grouped in an array and oll those arrays of dependend elements are in an array too.  
			var config={
				customInvalidClass:configUploadDialog.notValidClass||"invalid",
				customValidClass:configUploadDialog.validClass||"valid"
			};
			$(formcontainerSelector).each(function(index,element){
				$(element).find("input,select").on("change keyup", validation);
				var button = $(element).find('.wizardify-forward'); 

				function validation(){
					if($(element).find(":invalid"+", "+" ."+config.customInvalidClass).length===0){
						button.prop("disabled",false);
					}else{
						button.prop("disabled",true);
					}
				}
				validation();
			}); //each end
		},
		enhanceRequiredFields:function (selector, textToAdd){
		//adds the textToAdd (usually a "*") behind the selected (by selector) elements (usually ones with the attribute "required")
			$("<span> "+textToAdd+"<span>").insertAfter(selector);
		},
		constraintsUploadElements:function(event,ui){//TODO: is this still called? if not, clean up. 
			var config={
				laststepSelector:"#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-usefile",
				cssClassBackwardButton:'.wizardify-backward',
			};

			if(event.type==="visualUploaderTool-upload-complete"){ //disable the back-button, as the file is uploaded now anyway, no need to go back
				$(config.laststepSelector).find(config.cssClassBackwardButton).prop("disabled","true");
			}
		},
		constraintsMainElements:function(event,ui){
			var config={
				insertButtonSelector:"div.ui-dialog-buttonset button:nth-child(1)", //the automatically genreated buttons don't have IDs so we select them via position.
				mainInputFieldsSelector:"#wikieditor-toolbar-visualUploaderTool-mainFields",
				panelUploadSelector:"#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage",
				panelRecentSelector:"#wikieditor-toolbar-visualUploaderTool-imageSources-recentimagesContainer",
			};

			//disable fields
			if(event.type==="visualUploaderTool-upload-stashed"){
				$(config.insertButtonSelector).button("disable");
				$(config.mainInputFieldsSelector+" input").prop("disabled","true");
			}

			//reEnableFields
			if(event.type==="visualUploaderTool-upload-complete"){
				$(config.insertButtonSelector).button("enable");//this is a jqUI widget button, hence the method
				$(config.mainInputFieldsSelector+" input").removeProp("disabled","true");
			}

			if(event.type==="tabsselect"){ //tab changes
				if(ui && ui.panel === $(config.panelUploadSelector)[0]){//if the upload panel is active //panel is depreciated and removed in JQUI 1.10 and renamed to newPanel

				}
				console.log(ui.panel === $(config.panelRecentSelector)[0], ui.panel[0],$(config.panelRecentSelector)[0], ui )
				if(ui && ui.panel === $(config.panelRecentSelector)[0]){ //if the recent uploads panel is active //panel is depreciated and removed in JQUI 1.10 and renamed to newPanel
					$(config.insertButtonSelector).button("enable"); //this is a jqUI widget button, hence the method
					$(config.mainInputFieldsSelector+" input").removeProp("disabled","true");
				}
			}
		},
		generateSelects:function (domElement,content, descriptionElement){
			// Generates the selects based on a 

			//domElement: The select element that should get the options
			//content: a JSON with sub-object each provinding a short and long description and possibly a link to the original licencse text
			//desdescriptionElement: a jquery DOM Element

			//TODO sanitize: is domElement a jquery object?

			var fragment = document.createDocumentFragment();

			jQuery.each(content,function(key,value){

				var optionElement= $("<option/>",{"text":value.shortdesc,"value":key}).appendTo(fragment);
			});

			domElement.append(fragment);

			//if descrdescriptionElement is defined we want to change the html of this element accordingly to display some help about the selected option
			if(descriptionElement){
				domElement.change(function(evt){
					var selectedLicense = $(domElement).children("option:selected").attr("value");
					descriptionElement.html(content[selectedLicense].longdesc);
				});

			}
		},
		uniqueFilenameCheck:function(paramters){ 
			//this function checks if the filename given is o.k. or not. It uses the api to do so. 
			//returns true or false

			//paramters.messageElement,paramters.filenameinputElement, paramters.filename
			var config={
				invalidFilenameMessage:"",
				takenFilenameMessage:"",
				timeToCheck:200, //in ms
				messageElement: paramters.messageElement,
				validClass:configUploadDialog.validClass||"valid", //classname for valid Elements
				invalidClass:configUploadDialog.notValidClass||"invalid",
				filenameinputElement: paramters.inputElement

			};
			//var timeoutCode;

			var timeoutId;
			var counter = 0;
			function autoComplete() //http://stackoverflow.com/questions/6378696/use-settimeout-to-periodically-make-autocomplete-ajax-calls?answertab=votes#tab-top
			{
				//define function to be called on success: 
				var succ = function(data){
					var filenameStatus;

					if(data.query.pages['-2'] || data.query.pages['-1']){
						filenameStatus = "new";
						config.messageElement.text(""); //putting text here is irritating cause one can get filename bad
						config.filenameinputElement.addClass(config.validClass);
						config.filenameinputElement.removeClass(config.invalidClass);
						config.filenameinputElement.change(); //triggers check
						//add a  class to the element that signifies that is is o.k. 
						//remove a class from the element that signfies that the name is not o.k.

					}  else{
						filenameStatus = "taken";
						config.messageElement.text("This filename is already used. Please choose another");
						config.filenameinputElement.addClass(config.invalidClass);
						config.filenameinputElement.removeClass(config.validClass);
						config.filenameinputElement.change(); //triggers check
						//remove a  class to the element that signifies that is is o.k. 
						//add a class from the element that signfies that the name is not o.k.
						//display message saying that the name is taken
					}
				};

				//actual function
				counter++;
				var thisCounter = counter;
				clearTimeout(timeoutId)
				timeoutId = setTimeout(function () {
					var q = config.filenameinputElement.val();// get the q ... NOW //original:  var q = getQ() // get the q ... NOW
					if (q) {
						$.ajax({type:"GET",
							url: mw.util.wikiScript( 'api' ),
							data: {
								action:'query',
								titles:'File:'+q,
								format:'json'
							},
							success: function (data) {
								if (counter == thisCounter) {
									succ.apply(this,[data]); //was succ.apply(this, paramters)
								}
							}
						});
					}
				}, config.timeToCheck);
			}
			config.filenameinputElement.on("keyup",autoComplete);	
		},
		generateWikitext:function(divOwn,divOthers,licensesOwn_bool, licensesOwn, licensesOthers, config){

			/*
			divOwn: The jquery object div which contains the form Elements regarding the Infos on the own works 
			divOthers: The jquery object  div which contains the form Elements regarding the Infos on the own works 
			licensesOwn_bool: is own Work selected?
			licensesOwn: JavascriptObject containing Key for licencestype, each contianing an object with shortdesc, longdesc, identifier, linkToText
			config: additional config stuff. Not used at the moment. 
			*/

			var licenseCollection = licensesOwn_bool ? licensesOwn : licensesOthers;
			var sourceDiv = licensesOwn_bool ? divOwn : divOthers;
			var licenseIdentifier = sourceDiv.find('select[name="license"]').val();
			var license = licenseCollection[licenseIdentifier];

			var textfragments={
				name: sourceDiv.find('input[name="authorname"]').val(),
				source: sourceDiv.find('input[name="source"]').val(), 
				customlicense: sourceDiv.children('input[name="customlicense"]').val(),
				licensename:license.identifier,
				licenseShortdesc: license.shortdesc,
				licenseLongdesc: license.longdesc,
				linkToText: license.linkToText
			};

			var textArray = [
				"==Author==\n",
				textfragments.name,
				"\n",
				"==Source==\n",
				textfragments.source,
				"\n",
				"==License==\n",
				"This file is licensed as ",
				textfragments.licensename,
				textfragments.customlicense,
				". ",
				"\n",
				textfragments.licenseLongdesc,
				".",
				"\n",
				"The full license can be found <a href="+textfragments.linkToText+">here</a>"					
			];

			var wikitextLicense = textArray.join("");
			return wikitextLicense;
		},
		uploadSetup:function(parameters){
		
			var config={
				selectorFileinput: parameters.selectorFileinput, //the "upload a file" input"
				selectorMetadataUpload:parameters.selectorMetadataUpload, //the "click here to finish upload" (to get the missing metadata and estash- the file)
				text: parameters.text,
				fileDuplicatedText:"the content of the file already exists – in file",
				fileNameExistsText:"the name of the file already exists:",
				badFilenameText:"The filename is bad. Did you include the end (.jpg, or .png etc). Please choose another name. If this continues to come up, please do a re-upload",
				selectorDisplayHintsFile:"#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-uploadImage-status",
				selectorDisplayHintsMetadata:"#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-finished-hints",
				selectorInsertField:configUploadDialog.inputID, //the the "insert to document button"
				selectorInputFilename:'#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filemetadata input[name="filename"]',//the filed for defining the filename
				selectorForwardButtonFileUpload:'#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectFile button.wizardify-forward',
				selectorUploadContainer:'#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage',
				disableInputFilename:true, //disable the input for filename during the uploadProcess
				eventUploadStashed:"visualUploaderTool-upload-stashed", //event name for stashing the file
				eventUploadComplete:"visualUploaderTool-upload-complete" //event name when file is complete
			};

			var fileParameters={};

			//TODO: Drag and Drop
			//-> what is now in "change" needs to go in own function, so it can be accessed by the "change" and a "drop" event. 
			$(config.selectorFileinput).change(function(evt){
				if(evt.target.files.length===0){
					return;
				}; //if "change" was triggeed but not file uploaded

				fileParameters.file=evt.target.files[0],
				fileParameters.filename=evt.target.files[0].name;
				$(config.selectorInputFilename).val(evt.target.files[0].name).keyup();



				var errorfunction = function(data){
					console.log("error", data);
					if(data.filekey){
						fileParameters.filekey=data.upload.filekey;
					};
					//$(config.selectorFileinput).(selectorDisplayHints).text("there was a problem when uploading your file. You might wnat to try the old uploader (in the sidebar, \"upload file\" ");
				};

				uploadFunctions.uploadFile(fileParameters,"file",function(data){
					console.log("uploading", data);
					fileParameters.successfullFinished = false;
					fileParameters.filekey=data.upload.filekey;


					if(data.upload.warnings && data.upload.warnings.duplicate){
						$(config.selectorDisplayHintsFile).text(config.fileDuplicatedText+data.upload.warnings.duplicate[0])
					}else if(data.upload.warnings && data.upload.warnings.exists){
						$(config.selectorDisplayHintsFile).text(config.fileNameExistsText+data.upload.warnings.exists);
						$.event.trigger({
							type:config.eventUploadStashed ,
							event: {
								success: true,
								data: data
							}
						});
					}else{
						$(config.selectorDisplayHintsFile).text("file sucessfully registered for upload");
						$(config.selectorInsertField).val(data.upload.filename).change();
						//$(config.selectorForwardButtonFileUpload).click(); if that is activated it automatically jumps forward after successful upload

						var reader = new FileReader();
						reader.onload = function(readEvent) {
							//$("#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filePreview").html('<img src="'+readEvent.target.result+'">');


							var dataUri = readEvent.target.result
							//	img     = document.createElement("img");
							//img.src = dataUri;

							$(config.selectorUploadContainer).css({
								'background-image':'url('+dataUri+')',
								'background-repeat':'no-repeat',
								'background-position':'90% 5px',
								'background-size':'40px auto'
							})
							//document.body.appendChild(img);
						};

						reader.onerror = function(event) {
							console.error("File could not be read! Code " + event.target.error.code);
						};

						reader.readAsDataURL(fileParameters.file);



						//trigger success event
						$.event.trigger({
							type:config.eventUploadStashed ,
							event: {
								success: true,
								data: data
							}
						});

					}
				},function(data){console.log("error",data)});
			});

			$(config.selectorMetadataUpload).click(function(){
				fileParameters.text = uploadFunctions.generateWikitext($('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byme'),$('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byother'),$('input#selector-radio-license-byme').prop('checked'), configUploadDialog.ownWorkLicenses, configUploadDialog.ownWorkLicenses);
				fileParameters.filename = $(config.selectorInputFilename).val();

				uploadFunctions.uploadFile(fileParameters,"metadata",function(data){
					if(data.error && fileParameters.successfullFinished !== true){
						console.log("Error"+data.error.info);
						$(config.selectorDisplayHintsMetadata).text("OMG:"+data.error.info);
						return; 	
					}else if(data.upload.warnings && data.upload.warnings.duplicate){
						//console.log("Warning"+data.upload.warnings.duplicate);
						$(config.selectorDisplayHintsMetadata).text(config.fileDuplicatedText+data.upload.warnings.duplicate[0]); //[0] because obviously it is deliverd as array: like:  'duplicates':["myimage"]
						return;
					}else if(data.upload.warnings && data.upload.warnings.badfilename){
						$(config.selectorDisplayHintsMetadata).text(config.badFilenameText);
					}else if(data.upload.warnings && data.upload.warnings.exists){
						$(config.selectorDisplayHintsMetadata).text(config.fileNameExistsText+data.upload.warnings.exists+"please Change the name")
					}else if(data.upload.filename){
						$(config.selectorDisplayHintsMetadata).text("Image was sucessfully uploaded. You can now use the file in your article by clicking on insert"); 
						fileParameters.successfullFinished=true;

						$.event.trigger({
							type:config.eventUploadComplete ,
							event: {
								success: true,
								data: data
							}
						});

						var filename=data.upload.filename;
						$(config.selectorInsertField).val(filename);
					};


					//TODO: put stuff in the boxes on success
					//finename insert and the like...
					//use the xhtt-object you got back


					//fileParameters.filekey=data.upload.filekey;
					//$(selectorDisplayHints).text("filefunctionfunction sucessfully uploaded");
				},function(data){console.log("error",data);}); //,function(data){console.log(data)},function(xhr,status, error){console.log(error)} 
			});
		}, ////TODO make drag drop possible
		uploadFile:function(fileParameters,kindOfUpload,successfunction,errorfunction){
			//fileParameters: Object with stash, file,filekey,filename,text
			//kindOfUpload: "file" OR "metadata"
			//successfunction, errorfunction: functions for XHR-request

			var editToken; // mw.user.tokens.get( 'editToken' )
			var config; //{}
			var formdata; //new FormData()

			if(mw){
				editToken = mw.user.tokens.get( 'editToken' );
			}


			config={
				stash:fileParameters.stash||false, //true or false
				file: fileParameters.file || null, //the file to upload like the one fired on chage of a fileselector on as event.target.files[0]
				filekey:fileParameters.filekey || null, //the filekey returned after a stashed upload (needed to resume)
				filename:fileParameters.filename || fileParameters.file.name || null,
				text:fileParameters.text||null
			};


			formdata = new FormData();
			formdata.append("filename", config.filename);
			formdata.append("action", "upload");
			formdata.append("token", editToken);
			formdata.append("format", "json");


			if(kindOfUpload==="file"){
				formdata.append("file", config.file);
				formdata.append("stash", 1);
				formdata.append("ignorewarnings", true);
			}else if(kindOfUpload==="metadata"){
				formdata.append("text", config.text);
				formdata.append("filekey", config.filekey);

			}else{
				formdata.append("file", config.file);
				formdata.append("text", config.text);
			}

			$.ajax({ //http://stackoverflow.com/questions/6974684/how-to-send-formdata-objects-with-ajax-requests-in-jquery
					url: mw.util.wikiScript( 'api' ),
					contentType:false,
					processData:false,
					type:'POST',
					data: formdata,
					dataType:"json",
					success:successfunction,
					error:errorfunction
				});
			//https://en.wikipedia.org/w/api.php?action=upload&filename=Test.txt&file=file_contents_here&token=+\		
		},
		insertTextToEditor:function(){
			//function reacting on a button-press in jquerydialog
			var fileUse = dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-inputFilename').val()||"";

			if(fileUse===""){
				$('<div>Please specify an existing filename, use the upload wizard or the recent images tab</div>').dialog({appendTo:'#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage'});
				return;
			}

			var imageSize=dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-inputSize').val()||"";
			var imageThumb= dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-inputThumb').prop("checked");
			var imageCaption = dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-inputCaption').val()||"";
			var imageInsert = [
				"[[",
				"File:",
				fileUse,
				imageThumb ? "| thumb":"", //if it is true, give the string the value "|thumb"
				imageSize !=="" ? "|"+imageSize+"px" : "",//if imageSize not empty, give it the value "|12345px" (number arbitrary)
				imageCaption !=="" ? "|"+imageCaption : "",
				"]]"
			].join("");

			dialogDOM.$dialog.dialog( 'close' );
			
		(	//following function is CC-BY-SA 3.0 by Tim Down (https://stackoverflow.com/users/96100/tim-down). Source: https://stackoverflow.com/questions/7404366/how-do-i-insert-some-text-where-the-cursor-is
			function(el, text) {
				var val = el.value, endIndex, range, doc = el.ownerDocument;
				if (typeof el.selectionStart == "number"
								&& typeof el.selectionEnd == "number") {
						endIndex = el.selectionEnd;
						el.value = val.slice(0, endIndex) + text + val.slice(endIndex);
						el.selectionStart = el.selectionEnd = endIndex + text.length;
				} else if (doc.selection != "undefined" && doc.selection.createRange) {
						el.focus();
						range = doc.selection.createRange();
						range.collapse(false);
						range.text = text;
						range.select();
				}
			})($("textarea#wpTextbox1")[0],imageInsert)
		}
	}//upload Functions
		
		dialogDOM.$dialog.
			append(dialogDOM.$tabs).
			append(dialogDOM.$propertiesToInsert);
		
		
		uploadFunctions.wizardify({
				rootElement:dialogDOM.$tabs.find("#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage"),
				endFunction:function(){
					console.log("end");
					$(configUploadDialog.inputID).val(); //TODO: cleanup
					//TODO: Put image link in the input field
				}
			});

		dialogDOM.$dialog.on("dialogopen", function( event, ui ) {
				uploadFunctions.resetUploadForm(dialogDOM.$tabs.find('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage'));
				uploadFunctions.createRecentImagesList(); //call recent images list
			} );



		if( !window.FormData || !window.File || !window.FileReader){
			dialogDOM.$dialog.find("#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage").html("You browser does not support the HTML5 File API. If you can, get a more recent browser");
			return;
		}

		//events calling constraintElements()
		$(document).on("visualUploaderTool-upload-stashed",uploadFunctions.constraintsMainElements);
		$(document).on("visualUploaderTool-upload-complete",uploadFunctions.constraintsMainElements);
		$(document).on("visualUploaderTool-upload-complete",uploadFunctions.constraintsUploadElements);
		dialogDOM.$tabs.on("tabsselect tabsactivate", uploadFunctions.constraintsMainElements); //this is some old JQUI so tabselect is used too (MW 1.22)

		//General Upload Setup
		//enhanceRequiredFields("input[type=text][required]", "* &nbsp; "); //somehow this needs to be here as hidden elements are somehow not selected.
		uploadFunctions.makeCollapse('h3','#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense',{'disableRequired':true});
		uploadFunctions.makeCollapse('h4','#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byme',{'disableRequired':false});
		uploadFunctions.validateFormPart(".wizardify-forward","#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage>div");
		uploadFunctions.generateSelects(dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byme select[name="license"]'),configUploadDialog.ownWorkLicenses,dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byme-licenseDescription'));
		uploadFunctions.generateSelects($('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byother select[name="license"]'),configUploadDialog.othersWorkReasons,dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-selectLicense-byother-licenseDescription'));
		uploadFunctions.uniqueFilenameCheck({inputElement:dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filemetadata input[name="filename"]'),messageElement:dialogDOM.$dialog.find('#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filemetadata-filenamecheck')});
		uploadFunctions.uploadSetup({
			selectorFileinput:"#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-fileselect",
			selectorMetadataUpload:"#wikieditor-toolbar-visualUploaderTool-imageSources-uploadImage-filemetadata .wizardify-forward",
			});
		
		if($(".wikiEditor-ui").length > 0){
		//possibly mw.loader.using( ['ext.wikiEditor.dialogs'],function(){…}
			uploadFunctions.initEditorButton();
		}
		/*$('#wpTextbox1' ).on( 'wikiEditor-toolbar-doneInitialSections', uploadFunctions.initEditorButton);*/
		uploadFunctions.initSidebarButton();
		
		
		
		})();

	

	
}//$.ready

//commented out for live testing
//$(function(){ //jQuery is alyways loaded (see https://www.mediawiki.org/wiki/RL/DM#jquery)
	mw.loader.using( ['jquery.ui.dialog','jquery.ui.tabs'], function () {
		if(!mw.user.isAnon()){ //do not do anything if the user is not logged in (anonymous)
		gogogo();
		}
	})
//})