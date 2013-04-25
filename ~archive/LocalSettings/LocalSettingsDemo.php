<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.

if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "$IP/includes/DefaultSettings.php" );

# make the private settings private
# (also see http://www.mediawiki.org/wiki/Manual_talk:Wiki_family#Step_2:_Add_structure_for_separating_wikis )
require_once( "$IP/LocalSettingsPrivate.php" );


# ------ DISABLE THIS FOR MAINTENANCE MODE --------
#$wgReadOnly = "<br/><strong>The Medien Wiki is currently being updated. Please check back in a few minutes!</strong>";


# If PHP's memory limit is very low, some operations may fail.
# ini_set( 'memory_limit', '20M' );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

#$wgSitename 		= "Medien Wiki";		#defined in LocalSettingsPrivate.php

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
#$wgScriptPath 		= "/medien/wiki";		#defined in LocalSettingsPrivate.php
$wgScriptExtension 	= ".php5";
$wgArticlePath		= "{$wgScriptPath}/$1";

## UPO means: this is also a user preference option

$wgEnableEmail 		= true;
$wgEnableUserEmail 	= true; # UPO

#$wgEmergencyContact = "";					#defined in LocalSettingsPrivate.php
#$wgPasswordSender 	= "";					#defined in LocalSettingsPrivate.php

$wgEnotifUserTalk 	= true; # UPO
$wgEnotifWatchlist 	= true; # UPO
$wgEmailAuthentication = true;
$wgEmailConfirmToEdit  = true;

## Database settings						#defined in LocalSettingsPrivate.php
#$wgDBtype 			= "mysql";
#$wgDBserver 		= "";
#$wgDBname 			= "";
#$wgDBuser 			= "";
#$wgDBpassword 		= "";

# MySQL specific settings					#defined in LocalSettingsPrivate.php
#$wgDBprefix 		= "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 4.1/5.0.
#$wgDBmysql5 = true; // temporarily switched off to support chinese charset; 
// also see: http://www.gossamer-threads.com/lists/wiki/mediawiki/145379
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true; //false;
$wgImageMagickConvertCommand = "/usr/bin/convert";

## SVG-Conversion
## Das Problem hier ist, dass libmagickcore2-extra nicht installiert ist :-(
#$wgAllowTitlesInSVG = true;
#$wgSVGConverter = 'ImageMagick'; // or rsvg (n/a on web.uni-weimar)
#$wgSVGConverterPath = "/usr/bin";
#$wgMaxShellMemory = 131072;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
$wgHashedUploadDirectory = false;

# Additionally allowed file extensions for uploads
$wgFileExtensions[] = 'aac';
$wgFileExtensions[] = 'asc';
$wgFileExtensions[] = 'csv';
$wgFileExtensions[] = 'doc';
$wgFileExtensions[] = 'fla';
$wgFileExtensions[] = 'gif';
$wgFileExtensions[] = 'gpx';
$wgFileExtensions[] = 'igc';
$wgFileExtensions[] = 'jpg';
$wgFileExtensions[] = 'jpeg';
$wgFileExtensions[] = 'kml';
$wgFileExtensions[] = 'kmz';
$wgFileExtensions[] = 'maxpat';
$wgFileExtensions[] = 'mobileconfig';
$wgFileExtensions[] = 'mp3';
$wgFileExtensions[] = 'pdf';
$wgFileExtensions[] = 'pd';
$wgFileExtensions[] = 'pde';
$wgFileExtensions[] = 'pds';
$wgFileExtensions[] = 'png';
$wgFileExtensions[] = 'rte';
$wgFileExtensions[] = 'rtf';
$wgFileExtensions[] = 'svg';
$wgFileExtensions[] = 'swf';
$wgFileExtensions[] = 'trl';
$wgFileExtensions[] = 'txt';
$wgFileExtensions[] = 'wpt';
$wgFileExtensions[] = 'zip';

# Zip files and other files that can compromise the security of your site 
# are not permitted by default. 
# One way of avoiding the checks that inhibit uploading is to set:
# However, this is a bit of a risk if someone chooses to upload a nasty file.
$wgVerifyMimeType = false;
$wgAllowExternalImages = true;

# Show warning on attempts to upload files larger than 5 MB
$wgMaxUploadSize = 1024 * 1024 * 5;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX = false;

$wgLocalInterwiki = strtolower( $wgSitename );

$wgLanguageCode = "en";

#$wgSecretKey = "";						#defined in LocalSettingsPrivate.php

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'bauhausmedien';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = false;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
#$wgRightsUrl = "http://creativecommons.org/licenses/by-nc-sa/3.0/";
#$wgRightsText = "Attribution-Noncommercial-Share Alike 3.0 Unported";
#$wgRightsIcon = "http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png";
#$wgRightsCode = "[license_code]"; # Not yet used

# Set this to true if you want detailed copyright information forms on Upload.
$wgUseCopyrightUpload = true;
# Set this to false if you want to disable checking that detailed 
$wgCheckCopyrightUpload = true;

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );

# ----------------------------------------------------------------------------------------

#set default favicon
$wgFavicon = '/medien/wiki/skins/bauhausmedien/favicon_m.ico';

# restrict editing to registered users
# see http://www.mediawiki.org/wiki/Manual:$wgGroupPermissions
#$wgGroupPermissions['*']['createaccount'] = false; 	#TEMPORARY EMERGENCY SETTING DUE TO HACKER ATTACK
$wgGroupPermissions['*']['read'] = true;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['createtalk'] = false;
$wgGroupPermissions['*']['upload'] = false;
$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['user']['createpage'] = true;
$wgGroupPermissions['user']['createtalk'] = true;
$wgGroupPermissions['user']['upload'] = true;
#$wgGroupPermissions['user']['reupload-own'] = true;

# rename user extension (fix for umlauts)
//require_once("$IP/extensions/Renameuser/SpecialRenameuser.php");

# namespaces
#Number 100 and beyond are reserved for custom namespaces;
define("BUW_GMU", 100);
define("BUW_GMU_TALK", 101);
define("BUW_IFD", 102);
define("BUW_IFD_TALK", 103);
define("BUW_MODEN", 104);
define("BUW_MODEN_TALK", 105);
define("BUW_RADIO", 106);
define("BUW_RADIO_TALK", 107);
define("BUW_FOTO", 108);
define("BUW_FOTO_TALK", 109);
define("BUW_ME", 110);
define("BUW_ME_TALK", 111);
define("BUW_EXPTV", 112);
define("BUW_EXPTV_TALK", 113);
define("BUW_EKK", 114);
define("BUW_EKK_TALK", 115);
define("PDCON", 116);
define("PDCON_TALK", 117);
define("BUW_MME", 118);
define("BUW_MME_TALK", 119);

$wgExtraNamespaces[BUW_GMU] 		= "GMU";
$wgExtraNamespaces[BUW_GMU_TALK] 	= "GMU_talk";
$wgExtraNamespaces[BUW_IFD] 		= "IFD";
$wgExtraNamespaces[BUW_IFD_TALK] 	= "IFD_talk";
$wgExtraNamespaces[BUW_MODEN] 		= "MODEN";
$wgExtraNamespaces[BUW_MODEN_TALK] 	= "MODEN_talk";
$wgExtraNamespaces[BUW_RADIO] 		= "RADIO";
$wgExtraNamespaces[BUW_RADIO_TALK] 	= "RADIO_talk";
$wgExtraNamespaces[BUW_FOTO]		= "FOTO";
$wgExtraNamespaces[BUW_FOTO_TALK]	= "FOTO_talk";
$wgExtraNamespaces[BUW_ME]			= "ME";
$wgExtraNamespaces[BUW_ME_TALK]		= "ME_talk";
$wgExtraNamespaces[BUW_EXPTV]		= "EXPTV";
$wgExtraNamespaces[BUW_EXPTV_TALK]	= "EXPTV_talk";
$wgExtraNamespaces[BUW_EKK]			= "EKK";
$wgExtraNamespaces[BUW_EKK_TALK]	= "EKK_talk";
$wgExtraNamespaces[BUW_MME]			= "MME";
$wgExtraNamespaces[BUW_MME_TALK]	= "MME_talk";
$wgExtraNamespaces[PDCON]			= "PDCON";
$wgExtraNamespaces[PDCON_TALK]		= "PDCON_talk";

# Enable subpages in the main namespace
$wgNamespacesWithSubpages[NS_MAIN] = true;
# Enable subpages all other namespaces
$wgNamespacesWithSubpages[BUW_GMU] 	 = true;
$wgNamespacesWithSubpages[BUW_IFD] 	 = true;
$wgNamespacesWithSubpages[BUW_MODEN] = true;
$wgNamespacesWithSubpages[BUW_RADIO] = true;
$wgNamespacesWithSubpages[BUW_FOTO]	 = true;
$wgNamespacesWithSubpages[BUW_ME]	 = true;
$wgNamespacesWithSubpages[BUW_EXPTV] = true;
$wgNamespacesWithSubpages[BUW_EKK]	 = true;
$wgNamespacesWithSubpages[BUW_MME]	 = true;
$wgNamespacesWithSubpages[PDCON]	 = true;
#$wgNamespaceProtection[BUW_MK] = array( 'editbuwmk' ); #permission editbuwmk required

# one skin per namespace
require_once( "$IP/extensions/SkinPerNamespace/SkinPerNamespace.php" );
$wgSkinPerNamespace[BUW_GMU] 		= "bauhausmediengmu";
$wgSkinPerNamespace[BUW_GMU_TALK] 	= "bauhausmediengmu";
$wgSkinPerNamespace[BUW_IFD] 		= "bauhausmedienifd";
$wgSkinPerNamespace[BUW_IFD_TALK] 	= "bauhausmedienifd";
$wgSkinPerNamespace[BUW_MODEN] 		= "bauhausmedienmoden";
$wgSkinPerNamespace[BUW_MODEN_TALK] = "bauhausmedienmoden";
$wgSkinPerNamespace[BUW_RADIO] 		= "bauhausmedienradio";
$wgSkinPerNamespace[BUW_RADIO_TALK] = "bauhausmedienradio";
$wgSkinPerNamespace[BUW_FOTO]		= "bauhausmedienfoto";
$wgSkinPerNamespace[BUW_FOTO_TALK]	= "bauhausmedienfoto";
$wgSkinPerNamespace[BUW_ME]			= "bauhausmedienme";
$wgSkinPerNamespace[BUW_ME_TALK]	= "bauhausmedienme";
$wgSkinPerNamespace[BUW_EXPTV]		= "bauhausmedienexptv";
$wgSkinPerNamespace[BUW_EXPTV_TALK]	= "bauhausmedienexptv";
$wgSkinPerNamespace[BUW_EKK]		= "bauhausmedienekk";
$wgSkinPerNamespace[BUW_EKK_TALK]	= "bauhausmedienekk";
$wgSkinPerNamespace[BUW_MME]		= "bauhausmedienmme";
$wgSkinPerNamespace[BUW_MME_TALK]	= "bauhausmedienmme";
$wgSkinPerNamespace[PDCON]			= "bauhausmedienpdcon";
$wgSkinPerNamespace[PDCON_TALK]		= "bauhausmedienpdcon";
#to keep the user's prefs, this should be false
$wgSkinPerNamespaceOverrideLoggedIn = true;
#$wgSkinPerNamespace[NS_TALK] = "bauhausmedien";
#$wgSkinPerSpecialPage['Search'] = "modern";
#$wgSkinPerSpecialPage['Recentchanges'] = "chick";

#Set default searching, see http://www.mediawiki.org/wiki/Manual:$wgNamespacesToBeSearchedDefault
$wgNamespacesToBeSearchedDefault = array(
	NS_MAIN =>          	true,
	NS_TALK =>          	false,
	NS_USER =>          	true,
	NS_USER_TALK =>     	false,
	NS_PROJECT =>			true,
	NS_PROJECT_TALK =>		false,
	NS_IMAGE =>         	true,
	NS_IMAGE_TALK =>    	false,
	NS_MEDIAWIKI =>      	true,
	NS_MEDIAWIKI_TALK => 	false,
	NS_TEMPLATE => 			false,
	NS_TEMPLATE_TALK => 	false,
	NS_HELP =>           	true,
	NS_HELP_TALK =>      	true,
	NS_CATEGORY =>       	true,
	NS_CATEGORY_TALK =>  	false,
	BUW_GMU => 				true,
	BUW_GMU_TALK =>			false,
	BUW_IFD => 				true,
	BUW_IFD_TALK =>			false,
	BUW_MODEN => 			true,
	BUW_MODEN_TALK =>		false,
	BUW_RADIO => 			true,
	BUW_RADIO_TALK =>		false,
	BUW_FOTO =>				true,
	BUW_FOTO_TALK =>		false,
	BUW_ME =>				true,
	BUW_ME_TALK =>			false,
	BUW_EXPTV =>			true,
	BUW_EXPTV_TALK =>		false,
	BUW_EKK =>				true,
	BUW_EKK_TALK =>			false,
	BUW_MME =>				true,
	BUW_MME_TALK =>			false,
	PDCON =>				true,
	PDCON_TALK =>			false
);


# sidebar per namespace extension
require_once( "$IP/extensions/StubManager/StubManager.php" );
require_once( "$IP/extensions/SidebarEx/SidebarEx.php" );
# Define the priority list i.e. group membership search order.
$bwSidebarSearch = array ('Sysop', 'User', '*' );


# Category Suggest
require_once( "{$IP}/extensions/SelectCategoryTagCloud/SelectCategoryTagCloud.php" );
$wgSelectCategoryNamespaces[NS_TEMPLATE] = false;
$wgSelectCategoryNamespaces[BUW_GMU] 	 = true;
$wgSelectCategoryNamespaces[BUW_IFD] 	 = true;
$wgSelectCategoryNamespaces[BUW_MODEN] 	 = true;
$wgSelectCategoryNamespaces[BUW_RADIO] 	 = true;
$wgSelectCategoryNamespaces[BUW_FOTO]	 = true;
$wgSelectCategoryNamespaces[BUW_ME]		 = true;
$wgSelectCategoryNamespaces[BUW_EXPTV]	 = true;
$wgSelectCategoryNamespaces[BUW_EKK]	 = true;
$wgSelectCategoryNamespaces[BUW_MME]	 = true;
$wgSelectCategoryNamespaces[PDCON]		 = true;
$wgSelectCategoryEnableSubpages 		 = true;

# Cite Support
require_once("$IP/extensions/Cite/Cite.php");

# Edit Section Image for "[edit]"-Text, //Path to YOUR "[edit]" link icon!
$wgEditSectionIcon = "$wgScriptPath/skins/bauhausmedien/icons/edit.gif"; 
require_once("$IP/extensions/EditSectionLinkTransform.php");

# SyntaxHighlighter
require_once("$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php");

# ReCaptcha
require_once( "$IP/extensions/recaptcha/ReCaptcha.php" );
# Sign up for these at http://recaptcha.net/api/getkey
#$recaptcha_public_key = '';				#defined in LocalSettingsPrivate.php
#$recaptcha_private_key = '';				#defined in LocalSettingsPrivate.php
# Test if spam increases if captcha is disabled for confirmed users:
$wgGroupPermissions['emailconfirmed']['skipcaptcha'] = true;
$ceAllowConfirmedEmail = true;

# extra spam protection
$wgSpamRegex = "/\<.*style.*?(display|position|overflow|visibility)\s*:.*?>/i";

# Spam Blacklist
require_once( "$IP/extensions/SpamBlacklist/SpamBlacklist.php" );
$wgSpamBlacklistFiles = array(
	//"$IP/extensions/SpamBlacklist/wikimedia_blacklist", // Wikimedia's list
	"http://meta.wikimedia.org/w/index.php?title=Spam_blacklist&action=raw&sb_ver=1", // Wikimedia's list
	//  database title
	//"DB: wikidb My_spam_blacklist",    
);

# Simple AntiSpam (shows a hidden form element, denies edits if this form element is *not* empty)
require_once("$IP/extensions/SimpleAntiSpam/SimpleAntiSpam.php");
# AntiBot Extension (eg Spambots)
require_once("$IP/extensions/AntiBot/AntiBot.php" );
# UserThrottle		http://www.mediawiki.org/wiki/Extension:UserThrottle
require_once("$IP/extensions/UserThrottle/UserThrottle.php");
$wgGlobalAccountCreationThrottle = array(
    'min_interval' => 5, // Hard minimum time between creations
    'soft_time' => 300, // Timeout for rolling count
    'soft_limit' => 10, // 10 registrations in five minutes
);
# Check EmailAddress	http://www.mediawiki.org/wiki/Extension:CheckEmailAddress
require_once("$IP/extensions/CheckEmailAddress/CheckEmailAddress.php");
$wgCheckEmailAddressDomainSources = array(
	'type'  => CEASRC_FILE,
	'src'   => "$IP/Blacklist.txt"
);
$wgCheckEmailAddressNameSigns = array(
	array(
		'sign'          => ".",
		'maxcount'      => 5,
	),
);
# Email Domain Check 		http://www.mediawiki.org/wiki/Extension:EmailDomainCheck
require_once( "$IP/extensions/EmailDomainCheck/EmailDomainCheck.php" );
#$wgEmailDomain[] = '';				#defined in LocalSettingsPrivate.php


# Image Map
require_once("$IP/extensions/ImageMap/ImageMap.php");

# PDF Previews
require_once("$IP/extensions/PdfHandler/PdfHandler.php");
$wgPdfProcessor = 'gs';
$wgPdfPostProcessor = $wgImageMagickConvertCommand;
$wgPdfInfo = 'pdfinfo';
$wgImageMagickConvertCommand = "/usr/bin/convert";

# collection Extension is uploaded, but inactive.
# see: http://svn.wikimedia.org/svnroot/mediawiki/trunk/extensions/Collection/README.txt

# Maps
require_once( "$IP/extensions/Maps/Maps.php" );
# API keys configuration
# Your Google Maps API key. Required for displaying Google Maps, and using the Google Geocoder services
#$egGoogleMapsKey = ""; 				#defined in LocalSettingsPrivate.php
# Your Yahoo! Maps API key. Required for displaying Yahoo! Maps
#$egYahooMapsKey = "";					#defined in LocalSettingsPrivate.php
# Public Transport OSM layer for OpenLayers
$egMapsOLAvailableLayers['osm-oepnv'] = array('OpenLayers.Layer.OSM("ÖPNV Deutschland", "http://tile.xn--pnvkarte-m4a.de/tilegen/${z}/${x}/${y}.png", {numZoomLevels: 19,buffer:0})');

# Flash extension
require_once("$IP/extensions/Flash.php");

# VideoFlash extension
require_once("extensions/VideoFlash.php");

# mp3 extension
require_once("extensions/flashmp3/flashmp3.php");

# Random image
# usage: <randomimage size="100" float="left" choices="Apple.jpg|Pear.jpg" />
require_once( "{$IP}/extensions/RandomImage/RandomImage.php" );

# Fancy Box Thumbs: http://www.mediawiki.org/wiki/Extension:FancyBoxThumbs
include_once("$IP/extensions/FancyBoxThumbs/FancyBoxThumbs.php");
 
# Lingo Glossary Extension
# http://www.mediawiki.org/wiki/Extension:Lingo
require_once("$IP/extensions/Lingo/Lingo.php");
#$wgexLingoPage to specify a different name for the terminology page; Example: $wgexLingoPage = 'Glossary';
#$wgexLingoDisplayOnce to specify that each term should be annotated only once per page; Example: $wgexLingoDisplayOnce = true;
#$wgexLingoUseNamespaces to specify what namespaces should or should not be used; Example: $wgexLingoUseNamespaces[NS_TALK] = false;

# Multilang: http://www.mediawiki.org/wiki/Extension:Multilang
#require_once("extensions/Multilang.php");

# Language Selector: http://www.mediawiki.org/wiki/Extension:LanguageSelector
#require_once( "$IP/extensions/LanguageSelector/LanguageSelector.php" );
#$wgLanguageSelectorDetectLanguage = LANGUAGE_SELECTOR_PREFER_CLIENT_LANG;

# Parser Functions
#http://www.mediawiki.org/wiki/Extension:ParserFunctions
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );
$wgPFEnableStringFunctions = true;


// Include jQuery
function wfIncludeJQuery() {
        global $wgOut;
        $wgOut->includeJQuery();
}
$wgExtensionFunctions[] = 'wfIncludeJQuery';


