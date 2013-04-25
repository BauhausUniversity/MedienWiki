<?php
/**
 * Bauhaus Medien
 * Adapted from MonoBook
 * by Michael Markert
 * http://web.uni-weimar.de/medien/wiki
 *
 * In LocalSettings.php set
 * $wgDefaultSkin = 'bauhausmedienmme'
 */

// check for MediaWiki environment
if( !defined( 'MEDIAWIKI' ) ) { die( -1 ); }


// define basic skin settings & css imports
class SkinBauhausMedienMME extends SkinBauhausMedienTemplate {

	function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$this->skinname  = 'bauhausmedienmme';
		$this->stylename = 'bauhausmedienmme';
		$this->template  = 'bauhausmedienmmeTemplate';
	}

	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		// add custom stlye
		// eg: $out->addStyle( 'bauhausmedien/_bauhausmedienmme.css', 'screen' );
	}
	
}


// main skin class html parser;
// extend to change templatePrfs settings
class BauhausMedienMMETemplate extends BauhausMedienTemplate {
	
	// override used vars like title and main home url
	function initPrfs() {
		// Default images (English)
		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke.jpg';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design.png'; 
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Multimedia Narration / Prof. Dr. Walter Bauer-Wabnegg';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/cms/medien.html';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/cms/medien/medienkunstmediengestaltung.html';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://web.uni-weimar.de/medien/wiki/MME:Start'; // Link of $mySubtitle
		$this->templPrefs['showCCLicense']		= false;
		$this->templPrefs['favicon']			= '/bauhausmedien/favicon_m.ico';
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke.jpg';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung.jpg';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Multimediales Erzählen / Prof. Dr. Walter Bauer-Wabnegg';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';
	}

}

// note: don't close php ?,> here!
