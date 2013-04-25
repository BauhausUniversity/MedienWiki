<?php

# Setup and Hooks for the SelectCategoryTagCloud extension.

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
## Abort if AJAX is not enabled
if( !$wgUseAjax ) {
	trigger_error( 'SelectCategoryTagcloud: please enable $wgUseAjax.', E_USER_WARNING );
	return;
}

## HAXIE: Abort if section is being edited
if( isset($_GET['section']) ) { // || ($_GET['action'] == 'submit') ) {
	// don't show this category plugin on section edits // and previews
	return;
}

## Options:
# $wgSelectCategoryNamespaces - list of namespaces in which this extension should be active
if( !isset( $wgSelectCategoryNamespaces	) ) $wgSelectCategoryNamespaces = array(
	NS_MEDIA		  => true,
	NS_MAIN			  => true,
	NS_TALK			  => true,
	NS_USER			  => false,
	NS_USER_TALK	  => false,
	NS_PROJECT		  => true,
	NS_PROJECT_TALK	  => false,
	NS_IMAGE		  => true,
	NS_IMAGE_TALK	  => false,
	NS_MEDIAWIKI	  => false,
	NS_MEDIAWIKI_TALK => false,
	NS_TEMPLATE		  => true,
	NS_TEMPLATE_TALK  => false,
	NS_HELP			  => true,
	NS_HELP_TALK	  => false,
	NS_CATEGORY		  => true,
	NS_CATEGORY_TALK  => false,
	100               => true
);
# $wgSelectCategoryRoot	- root category to use for which namespace, otherwise self detection (expensive)
if( !isset( $wgSelectCategoryRoot ) ) $wgSelectCategoryRoot = array(
	NS_MEDIA			=> false,
	NS_MAIN				=> false,
	NS_TALK				=> false,
	NS_USER				=> false,
	NS_USER_TALK		=> false,
	NS_PROJECT			=> false,
	NS_PROJECT_TALK		=> false,
	NS_IMAGE			=> false,
	NS_IMAGE_TALK		=> false,
	NS_MEDIAWIKI		=> false,
	NS_MEDIAWIKI_TALK	=> false,
	NS_TEMPLATE			=> false,
	NS_TEMPLATE_TALK	=> false,
	NS_HELP				=> false,
	NS_HELP_TALK		=> false,
	NS_CATEGORY			=> false,
	NS_CATEGORY_TALK	=> false
);
# $wgSelectCategoryEnableSubpages - if the extension should be active on subpages or not (true, as subpages are disabled by default)
if( !isset( $wgSelectCategoryEnableSubpages ) ) $wgSelectCategoryEnableSubpages = true;

# $wgCategorySuggestjs, $wgCategorySuggestcss - paths to script and css files if needed to be moved elsewhere
# $wgCategorySuggestNumToSend  - max number of suggestions to send to browser - not implemented
# $wgCategorySuggestUnaddedWarning - not implemented
# $wgCategorySuggestCloud : cloud - use cloud ; anything else - list
#
$wgSelectCategoryTagCloudjs 		= $wgScriptPath . '/extensions/SelectCategoryTagCloud/SelectCategoryTagCloud.js' ;
$wgSelectCategoryTagCloudcss 		= $wgScriptPath . '/extensions/SelectCategoryTagCloud/SelectCategoryTagCloud.css';
$wgSelectCategoryTagCloudNumToSend 	= '50';
$wgSelectCategoryTagCloudUnaddedWarning = 'True';
$wgSelectCategoryTagCloudCloud 		= 'list';

## Register extension setup hook and credits:
$wgExtensionFunctions[]	= 'fnSelectCategory';
$wgExtensionCredits['parserhook'][] = array(
	'name'		=> 'SelectCategoryTagCloud (version 1.3)',
	'author'	=> 'Andreas Rindler <mediawiki at jenandi dot com>',
	'url'		=> 'http://www.mediawiki.org/wiki/Extension:SelectCategoryTagCloud',
	'description'	=> 'Adds a category selection tag cloud to the edit and upload pages and enables a Google Suggest like completion of categories/typeahead entered by the user. Based on WikiCategoryTagCloud, YetAnotherTagCloud and SelectCategory.'
);
## register Ajax function to be called from Javascript file
$wgAjaxExportList[] = 'fnSelectCategoryTagCloudAjax';

## Entry point for Ajax, registered in $wgAjaxExportList; returns all cats starting with $query
function fnSelectCategoryTagCloudAjax( $query ) {
	if(isset($query) && $query != NULL) {
		$searchString = mysql_real_escape_string($query);
		# % and _ are not escaped so do it here
		$searchString = str_replace( '%' , '\%' , $searchString );
		$searchString = str_replace( '_' , '\_' , $searchString );
		$searchString = str_replace( '|' , '%' , $searchString );
		$dbr =& wfGetDB( DB_SLAVE );
		$categorylinks = $dbr->tableName('categorylinks');
		$page          = $dbr->tableName('page');
		$sql =
			"SELECT DISTINCT\n".
			"    cl_to AS cats\n".
			"  FROM $categorylinks\n".
			"  WHERE\n".
			"    UCASE(cl_to) LIKE UCASE('".$searchString."%')\n";
		$res = $dbr->query( $sql );
		$suggestStrings = array();
		for ( $i=0 ; $row = $dbr->fetchObject( $res )  ; $i++ ) {
			array_push($suggestStrings,$row->cats);
## Optional enhancement: Cutoff and rollover at max number of suggestions
## implement cutoff and rollover here
#			if ($i > 10) {
#				array_push($suggestStrings,'More...');
#				break;
#			}
		}
	        $text = implode("<",$suggestStrings);
		$dbr->freeResult( $res );
	}
	if ( !isset($text) || $text == NULL ) {
		$text = '<';
	}
	$response = new AjaxResponse($text);
	return $response;
}

## Set Hook:
function fnSelectCategory() {
	global $wgHooks;
	
	## Showing the boxes
	# Hook when starting editing:
	$wgHooks['EditPage::showEditForm:initial'][] = array( 'fnSelectCategoryShowHook', false );
	# Hook for the upload page:
	$wgHooks['UploadForm:initial'][] = array( 'fnSelectCategoryShowHook', true );

	## Saving the data
	# Hook when saving page:
	$wgHooks['EditPage::attemptSave'][] = array( 'fnSelectCategorySaveHook', false );
	# Hook when saving the upload:
	$wgHooks['UploadForm:BeforeProcessing'][] = array( 'fnSelectCategorySaveHook', true );

	## Infrastructure
	# Hook our own CSS:
	$wgHooks['OutputPageParserOutput'][] = 'fnSelectCategoryOutputHook';
	# Hook up local messages:
	$wgHooks['LoadAllMessages'][] = 'fnSelectCategoryMessageHook';
}

## Load the file containing the hook functions:
require_once( 'SelectCategoryTagCloud.body.php' );
?>