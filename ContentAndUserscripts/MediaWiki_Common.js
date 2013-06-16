
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
										<h2>Upload a file!</h2>\
										<input type="file" id="wikieditor-toolbar-mytool-imageSources-uploadImage-fileselect" name="files[]"/>\\n\
										<p class="helptext"></p>\
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
									<div id="wikieditor-toolbar-mytool-imageSources-uploadImage-filemetadata">\
										<h2>Name the file</h2>\
										<input name="filename" type="text" size="30" maxlength="30" placeholder="what should the name of the file be?">\
									</div>\
									<div id="wikieditor-toolbar-mytool-imageSources-uploadImage-usefile">\
										<h2>Use the file</h2>\
										<p>You can now use the file in your article by clicking on "insert</p>\
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
							
							//USER DATA
							var userData={
								file:null,
								filekey:null
							}
							//USER DATA END
						
							

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
									cssClassBackwardButton:'wizardify-backward',
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
									
									//we check if there is any function that should be applied before we turn to the next page
									/*var currentCheckfunction = function(){
										var foundCheckfunction;
										if($.isArray(conf.checkingFunctions)){
												for(var i=0;i<config.checkingFunctions.length;i++){ //for each object in checkin
													if(config.checkingFunctions[i].selector===wizardStepContainers.eq(index).attr("id")){ //if [i].selector matches the id of the current Container
														if($isFunction(config.checkingFunctions[i].checkFunction)){
															foundCheckfunction = checkingFunctions[i].checkFunction;
														}
													}
												}//for end
											return foundCheckfunction;
										}										
									}*/
										
									
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
											/*if(currentCheckfunction||currentCheckfunction()!== false){ //if the function is existend and after executing it, it returns false, dont "turn the page""
												return; 
											}*/
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
							var validateFormPart = function(forwardButtonSelector, formcontainerSelector){
								//Description: Activates/Deactivates the forward-button dependend on the :invalid pseudoclass
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
							
							var uniqueFilenameCheck = function(filename,finenameinputElement,explanationElement){
								//this function checks if the filename given is o.k. or not. It uses the api to do so. 
								//returns true or false
								config={
									invalidFilenameMessage:"",
									takenFilenameMessage:"",
									timeToCheck:200, //in ms
								};
								//setup input element
								var timeoutCode;
								
								inputElement.on("keyup",function(){
										clearTimeout(timeoutCode); //that stops the previous timeout for the function
										
										timeoutCode = setTimeout(function(){ //this starts a new timeout. It is is not interrupted, it is going to do an ajax request.									
											$.ajax({
												url: mw.util.wikiScript( 'api' ),
												type:'GET',
												data: {
													action:'query',
													titles:'File:'+filename,
													format:'json'
												},

												success: function(data){
													var filenameStatus;

													if(data.query['-2']){
														filenameStatus = "new";
														//add a  class to the element that signifies that is is o.k. 
														//remove a class from the element that signfies that the name is not o.k.

													} else if(data.query['-1']){
														filenameStatus = "invalid";
														//remove a  class to the element that signifies that is is o.k. 
														//add a class from the element that signfies that the name is not o.k.
														//display message saying that the name is invalid
													}else{
														filenameStatus = "taken";
														//remove a  class to the element that signifies that is is o.k. 
														//add a class from the element that signfies that the name is not o.k.
														//display message saying that the name is taken
													}
												},
												error: function(){
													console.log("An error ocurred when reaching the server");
												},
												dataType: "json"
											});//end Ajax
		
										},config.timeToCheck);//set the time till the previously given function is executed
									});
								
								//make requests
								
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
							
							var uploadSetup= function(parameters){
								var config={
								selectorFileinput: parameters.selectorFileinput,
								selectorMetadataUpload:parameters.selectorMetadataUpload,
								text: parameters.text,
								selectorDisplayHints:parameters.selectorDisplayHints
								};
								
								var fileParameters={};
								
								$(config.selectorFileinput).change(function(evt){
									fileParameters.file=evt.target.files[0],
									fileParameters.filename=evt.target.files[0].name;
									$('wikieditor-toolbar-mytool-imageSources-uploadImage-filemetadata input[name="filename"]').val(evt.target.files[0].name);
									
									var successfunction = function(data){
										fileParameters.filekey=data.upload.filekey;
										
										
										//$(selectorDisplayHints).text("file sucessfully uploaded");
									}
									
									var errorfunction = function(data){
										if(data.filekey)
										{fileParameters.filekey=data.upload.filekey}//WTF TODO It always calls the error function...
										//$(config.selectorFileinput).(selectorDisplayHints).text("there was a problem when uploading your file. You might wnat to try the old uploader (in the sidebar, \"upload file\" ");
									}
									
									uploadFile(fileParameters,"file",function(data){
										fileParameters.filekey=data.upload.filekey;
										//$(selectorDisplayHints).text("file sucessfully uploaded");
									},function(data){console.log("error",data)});
								});
								
								$(config.selectorMetadataUpload).click(function(){
									fileParameters.text = generateWikitext($('#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byme'),$('wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byother'),$('input#selector-radio-license-byme').prop('checked'), imageInsertConfig.ownWorkLicenses, imageInsertConfig.ownWorkLicenses);
									fileParameters.filename = $('wikieditor-toolbar-mytool-imageSources-uploadImage-filemetadata input[name="filename"]').val();
									uploadFile(fileParameters,"metadata",function(data){
										fileParameters.filekey=data.upload.filekey;
										//$(selectorDisplayHints).text("file sucessfully uploaded");
									},function(data){console.log("error",data)}); //,function(data){console.log(data)},function(xhr,status, error){console.log(error)} 
								});
								
								
							};
							var uploadFile = function(fileParameters,kindOfUpload,successfunction,errorfunction){
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
							};
							
							
/*							
 *								
 *var config={
								selectorFileinput: parameters.selectorFileinput,
								selectorMetadataUpload:parameters.selectorMetadataUpload,
								text: parameters.text,
								selectorDisplayHints:parameters.selectorDisplayHints
								}
 **/						
							
							
							createRecentImagesList();
							
							wizardify({
								rootElement:$('#wikieditor-toolbar-mytool-imageSources-uploadImage'),
								endFunction:function(){console.log("end")}
							});
							makeCollapse('h3','#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense',{'disableRequired':true});
							validateFormPart(".wizardify-forward","#wikieditor-toolbar-mytool-imageSources-uploadImage>div");
							generateSelects($('#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byme select[name="license"]'),imageInsertConfig.ownWorkLicenses);
							generateSelects($('#wikieditor-toolbar-mytool-imageSources-uploadImage-selectLicense-byother select[name="license"]'),imageInsertConfig.ownWorkLicenses);
							uploadSetup({
								selectorFileinput:"#wikieditor-toolbar-mytool-imageSources-uploadImage-fileselect",
								selectorMetadataUpload:"#wikieditor-toolbar-mytool-imageSources-uploadImage-filemetadata .wizardify-forward",
							});
							
							
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
