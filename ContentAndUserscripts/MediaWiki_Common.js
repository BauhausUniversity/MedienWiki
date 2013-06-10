
/* Any JavaScript here will be loaded for all users on every page load. */
/* https://www.mediawiki.org/wiki/Extension:WikiEditor/Toolbar_customization */
/* Example stuff can be seen in the /extentions/WikiEditor/modules/jquery.wikiEditor.dialogs.config.js */
/*

*/

/*
load needed modules 
 */


//actual code
$( '#wpTextbox1' ).on( 'wikiEditor-toolbar-doneInitialSections', function () {

//load needed modules 
mw.loader.load( 'jquery.ui.tabs' );


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
									<div id="wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense">\
										<h3><input id="selector-radio-license-byme" name="selector-radio-license" type="radio" required>I created this work</h3>\
										<div id="wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byme">\
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
										<div id="wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byother">\
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
							/*
							$('.wikieditor-toolbar-mytool-highlightUploadButton').on('click',function(e){
								var oldOpacity = $('.ui-widget-overlay').css("opacity")
								$('.ui-widget-overlay') //find the upload button/link
								.animate({"opacity": 0.2},50, function(){ //light up the background
									$('li#t-upload a')
								.animate({"margin-left": "+=5px"}, 200) //shake upload button to grab attention...
								.animate({"margin-left": "-=5px"}, 100)
								.animate({"margin-left": "+=35px"}, 100)
								.animate({"margin-left": "-=35px"}, 100)
								.animate({"margin-left": "+=20px"}, 150)
								.animate({"margin-left": "-=20px"}, 150, function(){
									$('.ui-widget-overlay').animate({"opacity": oldOpacity},200);}) //redo the dark background after shaking the button. 
								});
							}) ;
							*/
							//highlight uploadbutton end
							
							//CONFIG START
							var imageInsertConfig = {
								ailimit:5, //how many items shell be retrieved from the api?
								inputID: '#wikieditor-toolbar-mytool-inputFilename', //id of the input field that gets the image name, preceeded by a '#'
								thumbWidth: 32, //width of the image preview thumbnails ,
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
							//CONFIG END
							
							//TODO
							

							console.log("init Started");

							function createRecentImagesList(){
								$.ajax( {
										url: mw.util.wikiScript( 'api' ),
										dataType: 'json',
										data: {
											'action':'query',
											'format':'json',
											'list':'allimages',
											'ailimit':imageInsertConfig.ailimit, //see above for definition
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
										thumbLink = window.wgServer+window.wgScriptPath+'/thumb.php'+'?f='+imageTitle+'&w='+imageInsertConfig.thumbWidth; //link to thumb.php, generating and returning a thumb on request. parameters: f=filename, w=imagewidth
										$(li).append('<img src="'+thumbLink+'" '+' width="'+imageInsertConfig.thumbWidth+'"/>'+'<em>'+imageTitle+'</em>');
										$('<a href="#">use this</a>') //create a button which on click...
											.button()
											.on('click',(function(imageTitle){ //scoping/closure magic http://stackoverflow.com/questions/8624057/closure-needed-for-binding-event-handlers-within-a-loop
												return function(){
													$(imageInsertConfig.inputID).val('File:'+imageTitle); //changes the value of the input field to the filename of the image-list-item clicked on. 
												};
											})(imageTitle))
											.prependTo(li);
										$(li).appendTo(domList);
									}//END for
									$(domList).appendTo('#wikieditor-toolbar-mytool-imageSources-recentimagesContainer');//append the list of images to the dialog-box 
								}//end generateList()
							}//end createRecentImagesList()
							
							var wizardify=function(parameters){
								/* PARAMETERS: rootElementID: String; 
								 * SHORTDESC: Creates a simple wizard. single steps are <div> nested in another div, which is the Root element
								 */
								var config= {
									backbuttonText: parameters.backbuttonText||'back',
									forwardbuttonText:parameters.forwardbuttonText || 'forward',
									rootElement: parameters.rootElement,
									endFunction:parameters.endFunction,
									cssClassForwardButton:'wizardify-forward',
									cssClassBackwardButton:'wizardify-backward'
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
											'text':config.forwardbuttonText,
											'class':config.cssClassForwardButton
										}).click(function(){
											wizardStepContainers.eq(index).css('display','none');
											wizardStepContainers.eq(index+1).css('display','block');			
										}).appendTo(wizardStepContainers.eq(index).children('.wizardify-buttonset'));
									}
									if(index===wizardStepContainers.length-1){
										$('<button/>',{
											'text':config.forwardbuttonText,
											'class':config.cssClassForwardButton
										}).click(config.endFunction).appendTo(wizardStepContainers.eq(index).children('.wizardify-buttonset'));
									}
								});
							};
							
							var makeCollapse = function(signifierSelector,rootElementSelector,configParam){
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
								rootElement.children().filter(config.signifierSelector).each(function(index){
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
							};
							var validate = function(forwardButtonSelector, formcontainerSelector){
				
								//formcontainerSelector: the selector for the container of the elements (a div e.g.)
								//forwardButtonSelector: the selector of the forward-Button from the 
								//dependend elements, [[dependendA1,dependendA2],[dependendB1,dependendB2]]... so elements of which one needs to have a value are in grouped in an array and oll those arrays of dependend elements are in an array too.  

								$(formcontainerSelector).each(function(index,element){
									$(element).find("input,select").on("change keyup", validation);
									var button = $(element).find('.wizardify-forward'); 

									function validation(){
										if($(element).find(":invalid").length===0){
											button.prop("disabled",false);
										}else{
											button.prop("disabled",true);
										}
									}
									validation();
								}); //each end
							};
							var generateSelects = function (domElement,content){
								//domElement: The select element that should get the options
								//content: a JSON with sub-object each provinding a short and long description and possibly a link to the original licencse text

								//TODO sanitize: is domElement a jquery object?

								var fragment = document.createDocumentFragment();

								jQuery.each(content,function(key,value){
									$("<option/>",{"text":value.shortdesc,"value":key}).appendTo(fragment);
								});
								domElement.append(fragment);
							};
							
							var generateWikitext = function(divOwn,divOthers,licensesOwn_bool, licensesOwn, licensesOthers, config){
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

								textfragments={
									name: sourceDiv.find('input[name="authorname"]').val(),
									source: sourceDiv.find('input[name="source"]').val(), 
									customlicense: sourceDiv.children('input[name="customlicense"]').val(),
									licensename:license.identifier,
									licenseShortdesc: license.shortdesc,
									licenseLongdesc: license.longdesc,
									linkToText: license.linkToText
								}

								textArray = [
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
							}
							/*Create Wizard behaviour*/
							//attach events and actions to buttons
							//disable/enable dialog buttons

							/*GET LATEST UPLOADS from user, put into array*/
							//get recent images

							/*WRITE LATEST UPLOADS*/
							//for loop. generate [{},{},…] {} contains: title, evtl image link to thumbnail

							//generate text:li + evtl. preview + image name+ button
							//attach click-event for writing the value of #wikieditor-toolbar-mytool-inputFilename
							
							
							createRecentImagesList();
							
							wizardify({
								rootElement:$('#wikieditor-toolbar-mytool-imageSources-uploadImage'),
								endFunction:function(){generateWikitext($('#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byme'),$('wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byother'),$('input#selector-radio-license-byme').prop('checked'), imageInsertConfig.ownWorkLicenses, imageInsertConfig.ownWorkLicenses);}
							});
							makeCollapse('h3','#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense',{'disableRequired':true});
							validate(".wizardify-forward","#wikieditor-toolbar-mytool-imageSources-uploadImage>div");
							generateSelects($('#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byme select[name="license"]'),imageInsertConfig.ownWorkLicenses);
							generateSelects($('#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byother select[name="license"]'),imageInsertConfig.ownWorkLicenses);
							
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
					'tool': 'file'
					});
				
				}, function(){console.log("error initializing editor config");});
				
				window.setTimeout(changeToolbar, 500); //change toolbar after button has been inserted

});
