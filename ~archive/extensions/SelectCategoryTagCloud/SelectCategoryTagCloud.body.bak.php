<?php
/* SelectCategoryTagCloud Mediawiki Extension
 *
 * @author Andreas Rindler (mediawiki at jenandi dot com)
 * @credits Leon Weber <leon.weber@leonweber.de> & Manuel Schneider <manuel.schneider@wikimedia.ch>, Daniel Friesen http://wiki-tools.com
 * @licence GNU General Public Licence 2.0 or later
 * @description Adds a category selection tag cloud to the edit and upload pages and enables a Google Suggest like completion of categories entered by the user.
 *
*/



if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die();
}

/*************************************************************************************/
## Entry point for the hook and main worker function for editing the page:
function fnSelectCategoryShowHook( $m_isUpload = false, &$m_pageObj ) {
global $wgOut, $wgParser, $wgRequest, $wgSelectCategoryTagCloudCloud;

	global $wgSelectCategoryNamespaces;
	global $wgSelectCategoryEnableSubpages;
	global $wgTitle;
	global $wgScriptPath;	
	
# CLOUD PARAMTERS - TO BE MOVED TO LOCALSETTINGS.PHP FILE
	$input 	= array("min_size"=>77,"increase_factor"=>200,"min_count"=>1);
	$params	= array("style"=>"","class"=>"tagcloud", "linkstyle"=>"","linkclass"=>"tag","exclude"=>"");


	# Check if page is subpage once to save method calls later:
	$m_isSubpage = $wgTitle->isSubpage();
	# Run only if we are in an upload, a activated namespace or if page is a subpage and subpages are enabled (unfortunately we can't use implication in PHP):
	if ( $m_isUpload || ( $wgSelectCategoryNamespaces[$wgTitle->getNamespace()] && ( !$m_isSubpage || ( $m_isSubpage && $wgSelectCategoryEnableSubpages ) ) ) ) {
		# Get ALL categories from wiki:
//		$m_allCats = fnSelectCategoryGetAllCategories();
		# Load system messages:
		fnSelectCategoryMessageHook();
		# Get the right member variables, depending on if we're on an upload form or not:
		if( !$m_isUpload ) {
			# Check if page is subpage once to save method calls later:
			$m_isSubpage = $wgTitle->isSubpage();
	
			# Check if page has been submitted already to Preview or Show Changes
			$strCatsFromPreview = trim($wgRequest->getVal('txtSelectedCategories'));
			if(strlen($strCatsFromPreview)==0){
				# Extract all categorylinks from PAGE:
				$m_pageCats = fnSelectCategoryGetPageCategories( $m_pageObj );
			} else {
			 	# Get cats from preview
				$m_pageCats = explode(";",$strCatsFromPreview);
			}
			# Never ever use editFormTextTop here as it resides outside the <form> so we will never get contents
			$m_place = 'editFormTextAfterWarn';
			# Print the localised title for the select box:
			$m_textBefore = '<b>'. wfMsg( 'categorysuggest-title' ) . '</b>:';
		} else	{
			# No need to get categories:
			$m_pageCats = array();
			
			# Place output at the right place:
			$m_place = 'uploadFormTextAfterSummary';
		}
			#ADD TOOLTIP JAVASCRIPT
		$m_pageObj->$m_place .= "<script type=\"text/javascript\" src=\"" . $wgScriptPath . "/extensions/tooltips/wz_tooltip.js\"></script>\n";
		
		#ADD JAVASCRIPT
		$m_pageObj->$m_place .= "<script type=\"text/javascript\" src=\"" . $wgScriptPath . "/extensions/SelectCategoryTagCloud/SelectCategoryTagCloud.js\"></script>\n<script type=\"text/javascript\" src=\"" . $wgScriptPath . "/extensions/SelectCategoryTagCloud/tabs.js\"></script>\n";
		#ADD CSS 
		$m_pageObj->$m_place .= "<link type=\"text/css\" href=\"" . $wgScriptPath . "/extensions/SelectCategoryTagCloud/tabs.css\" rel=\"stylesheet\" />\n";	
		$m_pageObj->$m_place .= "<link type=\"text/css\" href=\"" . $wgScriptPath . "/extensions/SelectCategoryTagCloud/SelectCategoryTagCloud.css\" rel=\"stylesheet\" />\n";	
		
		#ADD EXISTING CATEGORIES TO INPUT BOX 
 		$arrExistingCats = array();
 		$arrExistingCats = $m_pageCats;
 		

	#ADD JAVASCRIPT - use document.write so it is not presented if javascript is disabled.
	$m_pageObj->$m_place .= "<script type=\"text/javascript\">/*<![CDATA[*/\n";		
	
		#ADD INPUT BOX FOR USERS TO ENTER CATEGORIES
		$m_pageObj->$m_place .= "document.write(\"<div id='categoryselectmaster'><b>" .wfMsg( 'selectcategory-title' )."</b><br>". wfMsg( 'selectcategory-subtitle' ). "<br><b>" .wfMsg( 'selectcategory-boxlabel' ).":</b><br>\");\n";
		$m_pageObj->$m_place .= "document.write(\"<input onkeyup='sendRequest(this,event);' autocomplete='off' type='text' name='txtSelectedCategories' id='txtSelectedCategories' maxlength='200' length='150' value='".str_replace("_"," ",implode(";", $arrExistingCats))."'/><br>\");\n";
		$m_pageObj->$m_place .= "document.write(\"<div id='searchResults'></div>\");\n";

				
		$m_pageObj->$m_place .= <<<EOD
document.write("<table class='table' id='table' cellpadding='0' cellspacing='0'><tr><td id='button1' class='buttonhighlight' onclick='ChangeColor(\"button1\",\"button2\");showhide(\"tagcloud\",\"hide\");'>&nbsp;Popular Categories</td><td class='buttonspace'>&nbsp;</td><td id='button2' class='buttonunhighlight' onclick='ChangeColor(\"button2\",\"button1\");showhide(\"hide\",\"tagcloud\");'>&nbsp;Category Hierarchy</td><td class='buttonspace'>&nbsp;</td><td class='buttonspacewide' colspan='2'><!-- Blank Tab to fill up the form -->&nbsp;</td></tr></table>");
EOD;
	
			/*
				<table class=\"outline\">
					<tr>
						<td>
						</td>
					</tr>
				</table>";		
				*/
		//$m_pageObj->$m_place .= "<br><br>" .wfMsg( 'selectcategory-taglabel' ). "\n";
		
		#ADD TAG CLOUD
		$m_pageObj->$m_place .= "document.write(\"".createTagCloud($input,$params,null,$arrExistingCats)."\");\n";;
		$m_pageObj->$m_place .= "document.write(\"<div id='hide' class='seconddiv' style='visibility: hidden'>\");\n";
		$m_pageObj->$m_place .= "document.write(\"Coming soon...\");\n";
		//$lParser = clone($wgParser);
//		$m_pageObj->$m_place .= $wgParser->recursiveTagParse("<categorytree depth=\"2\" onlyroot=\"on\" mode=\"all\" style=\"float:none; margin-left:1ex; border:1px solid gray; padding:0.7ex; background-color:white;\">Enterprise Content Management Offering Group</categorytree>");

		//$catTree = "document.write(\"<categorytree depth=\"2\" onlyroot=\"on\" mode=\"all\" style=\"float:none; margin-left:1ex; border:1px solid gray; padding:0.7ex; background-color:white;\">Enterprise Content Management Offering Group</categorytree>\");\n";
		//$m_pageObj->$m_place .= $wgParser->recursiveTagParse($catTree);
/*		if(is_object($wgParser)){
			$wgOut->addHTML("is object, really: " . is_object($wgParser));
			}
		*/
		
	$m_pageObj->$m_place .= "document.write(\"<input type='hidden' value='" . $wgSelectCategoryTagCloudCloud . "' id='txtCSDisplayType'/>\");\n";			
	$m_pageObj->$m_place .= "document.write(\"</div>\");\n";//category select master
	$m_pageObj->$m_place .= "document.write(\"</div>\");\n";//category select master
	$m_pageObj->$m_place .= "/*]]>*/</script>\n";		
		
	}	
	
	# Return true to let the rest work:
	return true;
}

/*************************************************************************************/
## Entry point for the hook and main worker function for saving the page:
function fnSelectCategorySaveHook( $m_isUpload, &$m_pageObj ) {
	global $wgContLang;
	global $wgOut;
	
	# Get localised namespace string:
	$m_catString = $wgContLang->getNsText( NS_CATEGORY );
	# Get some distance from the rest of the content:
	$m_text = "\n";
	
	# Assign all selected category entries:
	$strSelectedCats = $_POST['txtSelectedCategories'];

	#CHECK IF USER HAS SELECTED ANY CATEGORIES
	if(strlen($strSelectedCats)>1){
		$arrSelectedCats = array();
		$arrSelectedCats = explode(";",$_POST['txtSelectedCategories']);
	
	 	foreach( $arrSelectedCats as $m_cat ) {
	 	 	if(strlen($m_cat)>0){
				$m_text .= "\n[[$m_catString:" . mysql_escape_string(trim($m_cat)) . "]]";
			}
		}
		# If it is an upload we have to call a different method:
		if ( $m_isUpload ) {
			$m_pageObj->mUploadDescription .= $m_text;
		} else{
			$m_pageObj->textbox1 .= $m_text;
		}		
	}
	
	# Return to the let MediaWiki do the rest of the work:
	return true;
}

/*************************************************************************************/
## Entry point for the hook for printing the CSS:
function fnSelectCategoryOutputHook( &$m_pageObj, &$m_parserOutput ) {
	global $wgScriptPath;

	# Register CSS file for our select box:
	$m_pageObj->addLink(
		array(
			'rel'	=> 'stylesheet',
			'type'	=> 'text/css',
			'href'	=> $wgScriptPath . '/extensions/SelectCategoryTagCloud/SelectCategoryTagCloud.css'
		)
	);
	
	# Be nice:
	return true;
}

/*************************************************************************************/
## Entry point for the hook for our localised messages:
function fnSelectCategoryMessageHook() {
	global $wgLang;
	global $wgMessageCache;
	
	# Initialize array of all messages:
	$messages=array();
	# Load default messages (english):
	include( 'i18n/SelectCategory.i18n.php' );
	# Load localised messages:
	if( file_exists( dirname( __FILE__ ) . '/i18n/SelectCategory.i18n.' . $wgLang->getCode() . '.php' ) ) { // avoid warnings
		include( 'i18n/SelectCategory.i18n.' . $wgLang->getCode() . '.php' );
	}
	# Put messages into message cache:
	$wgMessageCache->addMessages( $messages );
	
	# Be nice:
	return true;
}

/*************************************************************************************/
## Returns an array with the categories the articles is in.
## Also removes them from the text the user views in the editbox.
function fnSelectCategoryGetPageCategories( $m_pageObj ) {
global $wgOut;

	# Get page contents:
	$m_pageText = $m_pageObj->textbox1;
//debug	
//	$wgOut->addHTML('<br><b>page text:</b> '.$m_pageText.' <b>end of page</b>');

$arrAllCats = Array();
$regulartext ='';
$nowikitext = '';
$cleanedtext ='';
$finaltext = '';
	# Check linewise for category links:

	$arrBlocks1 = explode( "<nowiki>", $m_pageText );
	$regulartext = $arrBlocks1[0];

	$cleanedtext = fnSelectCategoryStripCats($regulartext,$arrAllCats);
	
	$finaltext .= $cleanedtext;
	//$finaltext .= '<nowiki>' . $nowikitext;
	
	for($i=1; $i<count($arrBlocks1); $i++){
		$arrBlocks2 = explode( "</nowiki>", $arrBlocks1[$i] );
		//ignore cats here
		$nowikitext = $arrBlocks2[0];
		//add to final text
		$finaltext .= '<nowiki>' . $nowikitext . '</nowiki> ';
		
		//strip cats here
		$regulartext = $arrBlocks2[1];
		$cleanedtext = fnSelectCategoryStripCats($regulartext,$arrAllCats);
		$finaltext .= $cleanedtext;
	}

	//Place cleaned text back into the text box:
	$m_pageObj->textbox1 = trim( $finaltext );

//debug	
//	$wgOut->addHTML('<br><b>CATS:</b> '.implode(';',$arrAllCats).' <b>end of CATS</b>');

	
	return $arrAllCats;
	
}

function fnSelectCategoryStripCats($texttostrip, &$catsintext){
	global $wgContLang, $wgOut;

	# Get localised namespace string:
	$m_catString = strtolower( $wgContLang->getNsText( NS_CATEGORY ) );
	# The regular expression to find the category links:
	$m_pattern = "\[\[({$m_catString}|category):(.*?)\]\]";
	
	$m_replace = "$2";
	# The container to store all found category links:
	$m_catLinks = array ();
	# The container to store the processed text:
	$m_cleanText = '';


	# Check linewise for category links:
	foreach( explode( "\n", $texttostrip ) as $m_textLine ) {
		# Filter line through pattern and store the result:
        //$m_cleanText .= trim( preg_replace( "/{$m_pattern}/i", "", $m_textLine ) ) . "\n";

        // HAXIE -- TO PREVENT THIS PLUGIN TO REMOVE SPACES --
        $m_cleanText .= preg_replace( "/{$m_pattern}/i", "", $m_textLine )  . "\n";

		# Check if we have found a category, else proceed with next line:
        if( preg_match_all( "/{$m_pattern}/i", $m_textLine,$catsintext2,PREG_SET_ORDER) ){
//debug	
//	$wgOut->addHTML('<br><b>Found Category</b>');         
			 foreach( $catsintext2 as $local_cat => $m_prefix ) {
				//Set first letter to upper case to match MediaWiki standard
				$strFirstLetter = substr($m_prefix[2], 0,1);
				strtoupper($strFirstLetter);
				$newString = strtoupper($strFirstLetter) . substr($m_prefix[2], 1);
				array_push($catsintext,$newString);
					 			
	 		}
			# Get the category link from the original text and store it in our list:
			preg_replace( "/.*{$m_pattern}/i", $m_replace, $m_textLine,-1,$intNumber );
		}
		
	}

	return $m_cleanText;	
	
}
/*************************************************************************************/
/*********************************************************
************ Main function to create tag cloud************
**********************************************************/
# input=tags, params=attributes
function createTagCloud( $input, $params, $parser, $arrExistingCats ) {
 global $wgOut;
 
 //$arrLocal = array("Helping","Value2");
# set default variables
	$MIN_SIZE = 77;
	$INCREASE_FACTOR = 100;
 
	global $wgScript;
# connect to database and query categorylinks table
	$dbr = &wfGetDB(DB_SLAVE);
	extract($dbr->tableNames('categorylinks'));

	$cloud_style = $params['style'];
	$cloud_class = $params['class'];
	$link_style = $params['linkstyle'];
	$link_class = $params['linkclass'];
	$min_count_input = $input['min_count'];
	$min_size_input = $input['min_size'];
	$increase_factor_input = $input['increase_factor'];
	$excluded_input = $params['exclude'];
	
	if ($min_size_input != null) {
		$MIN_SIZE = $min_size_input;
	}
	if ($increase_factor_input != null) {
		$INCREASE_FACTOR = $increase_factor_input;
	}
	if ($min_count_input == null) {
		$min_count_input = 0;
	}

 
	$exclude_condition = "";
	if (strlen($excluded_input) > 0) {
		$excluded_categories = explode(",", $excluded_input);		
		if (count($excluded_categories) > 0) {
			$exclude_condition = " WHERE cl_to NOT IN (";
			for ($i = 0; $i < count($excluded_categories); $i++) {
				$exclude_condition = $exclude_condition . "'" . trim($excluded_categories[$i]) . "'";
				if ($i < count($excluded_categories) - 1) {
					$exclude_condition = $exclude_condition . ",";
				}
			}
			$exclude_condition = $exclude_condition . ")";			
		}
	}
 
	//$exclude_condition = mysql_real_escape_string($exclude_condition);
	//$min_count_input = mysql_real_escape_string($min_count_input);
 
	$sql = "SELECT cl_to as title, COUNT(*) as count FROM $categorylinks  " . $exclude_condition . " GROUP BY cl_to HAVING count >= $min_count_input ORDER BY cl_to ASC";
 
 #execute the query
	$res = $dbr->query($sql);
#get the number of rows in the result set
	$count = $dbr->numRows($res);
 
	$htmlOut = "";
//	$htmlOut = $htmlOut . "<div id=\"tagcloud\" class=\"divForTabbing " . $cloud_class . "\" style=\"{$cloud_style}\">";
 	$htmlOut = $htmlOut . "<div id='tagcloud' class='divForTabbing " . $cloud_class . "' style='{$cloud_style}'>";
 
	$min = 1000000;
	$max = -1;
 
 #loop through each row in the result set and get the name/count of each category
	for ($i = 0; $i < $count; $i++) {
		$obj = $dbr->fetchObject($res);
		$tags[$i][0] = $obj->title;
		$tags[$i][1] = $obj->count;
#don't know why this is happening? if normal count, then min and max are equal to the real numbers		
		if ($obj->count < $min) {
			$min = $obj->count;
		}
		if ($obj->count > $max) {
			$max = $obj->count;
		}
	}
 #ADD EACH SINGLE CATEGORY TO THE CLOUD
	for ($i = 0; $i < $count; $i++) {
		$textSize = $MIN_SIZE + ($INCREASE_FACTOR * ($tags[$i][1])) / ($max);
		$title = Title::makeTitle( NS_CATEGORY, $tags[$i][0] );
		$style = $link_style;
		if( $style != '' && $style{-1} != ';' ) $style .= ';'; 
		$style .= "font-size: {$textSize}%;";

		//Highlight existing categories in the tag cloud
		$existingClass = '';
//$wgOut->addHTML('<br><b>title:</b> '.$title->getText());
//$wgOut->addHTML('<br><b>arrExistingCats:</b> '.$arrExistingCats);
		
		if (in_array($title->getText(), $arrExistingCats)){
			$existingClass = 'tagselected ';
		}
//		$currentRow = "<span title=\"" .wfMsg( 'selectcategory-tooltip' ). "\" onclick=\"checkCategory(this)\" class=\"" . $existingClass . $link_class . "\" style=\"{$style}\">" . $title->getText() . "</span>&nbsp; ";
		$currentRow = "<span title='" .wfMsg( 'selectcategory-tooltip' ). "' onclick='checkCategory(this)' class='" . $existingClass . $link_class . "' style='{$style}'>" . $title->getText() . "</span>&nbsp; ";
		

		$htmlOut = $htmlOut . $currentRow;
	}
	$htmlOut = $htmlOut . "</div>";
	$htmlOut = $htmlOut . "<br>";
	
	return $htmlOut;
}
?>