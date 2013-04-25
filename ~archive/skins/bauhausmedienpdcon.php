<?php
/**
 * Bauhaus Medien PDCon
 * Adapted from MonoBook
 * by Michael Markert
 * modified for PDCon
 * http://web.uni-weimar.de/medien/wiki
 *
 * In LocalSettings.php set
 * $wgDefaultSkin = 'bauhausmedienpdcon'
 */

// check for MediaWiki environment
if( !defined( 'MEDIAWIKI' ) ) { die( -1 ); }


// define basic skin settings & css imports
class SkinBauhausMedienPDCon extends SkinBauhausMedienTemplate {

	function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$this->skinname  = 'bauhausmedienpdcon';
		$this->stylename = 'bauhausmedienpdcon';
		$this->template  = 'bauhausmedienpdconTemplate';
	}

	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		// add custom stlye
		$out->addStyle( 'bauhausmedien/_bauhausmedienpdcon.css', 'screen' );

  }
	
	
}


// main skin class html parser;
// extend to change templatePrfs settings
class BauhausMedienPDConTemplate extends BauhausMedienTemplate {
	
	// override used vars like title and main home url

	function initPrfs() {
		// Default images (English)
		$this->templPrefs['myUniWortmarke']             = 'pd-buw.png';
		$this->templPrefs['myFakWortmarke']		= 'pd-hfm.png';
		$this->templPrefs['myTitleLogo']		= 'pd-logo-350px.png';
		$this->templPrefs['myTitle']			= 'PureData Convention 2011';
		$this->templPrefs['mySubtitle']			= ''; 
		$this->templPrefs['myFakLink'] 			= 'http://www.hfm-weimar.de';		// Link of $myFakWortmarke
		$this->templPrefs['myTitleLink']		= 'http://puredata.uni-weimar.de/';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://puredata.uni-weimar.de/'; // Link of $mySubtitle
		$this->templPrefs['showCCLicense']		= false;
		$this->templPrefs['favicon']			= '/bauhausmedien/pdcon/pd-favicon.ico';
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'pd-hfm.png';
		$this->templPrefs['myTitleLogo_de']		= 'pd-logo-350px.png';
		$this->templPrefs['myTitle_de']			= 'PureData Convention 2011';
		$this->templPrefs['mySubtitle_de']		= '';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';
/*		'
<script type="text/javascript" language="javascript">// <![CDATA[
	// override Sidebar State (Presentation / Zoom level)
	document.getElementById("p-Startseiten").getElementsByTagName("div")[0].style.display = "none";
	document.getElementById("p-Wiki_Related").getElementsByTagName("div")[0].style.display = "none";
	// ]]>
</script>		
		'; 
*/
	}

}

// note: don't close php ?,> here!
