<?php
/**
 * Bauhaus Medien
 * Adapted from MonoBook
 * by Michael Markert
 * http://web.uni-weimar.de/medien/wiki
 *
 * In LocalSettings.php set
 * $wgDefaultSkin = 'bauhausmediengmu'
 */

// check for MediaWiki environment
if( !defined( 'MEDIAWIKI' ) ) { die( -1 ); }


// define basic skin settings & css imports
class SkinBauhausMedienGMU extends SkinBauhausMedienTemplate {

	function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$this->skinname  = 'bauhausmediengmu';
		$this->stylename = 'bauhausmediengmu';
		$this->template  = 'bauhausmediengmuTemplate';
	}

	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		// add custom stlye
		$out->addStyle( 'bauhausmedien/_bauhausmediengmu.css', 'screen' );
	}
	
}


// main skin class html parser;
// extend to change templatePrfs settings
class BauhausMedienGMUTemplate extends BauhausMedienTemplate {
	
	// override used vars like title and main home url
	function initPrfs() {
		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke_P368.png';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media_P368.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design_P368.png';
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Medial Environments / Prof. Ursula Damm';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/cms/medien.html';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/cms/medien/medienkunstmediengestaltung.html';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://www.uni-weimar.de/medien/umgebungen'; // Link of $mySubtitle
		$this->templPrefs['showCCLicense']		= false;
		$this->templPrefs['favicon']			= '/bauhausmedien/favicon_gmu.ico';
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke_P368.png';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung_P368.png';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Gestaltung medialer Umgebungen / Prof. Ursula Damm';
		// extra HTML
		$this->templPrefs['extraHTML']			= '';
	}

}

// note: don't close php ?,> here!
