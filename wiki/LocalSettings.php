<?php
# This file was automatically generated by the MediaWiki 1.20.4
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# http://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}




################ MAINTENANCE MODE ####################

#$wgReadOnly = "<br/><strong>The Medien Wiki is currently being updated. Please check back in a few minutes!</strong>";

# This shows exceptions. This should be disabled on a stable running system. 
$wgShowExceptionDetails = true;




################ PRIVATE SETTINGS ####################


# private settings
# (also see http://www.mediawiki.org/wiki/Manual_talk:Wiki_family#Step_2:_Add_structure_for_separating_wikis )
require_once( "$IP/LocalSettingsPrivate.php" );






################ GENERAL SETTINGS ####################


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename      = "Medien Wiki";
$wgMetaNamespace = "MedienWiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL
#$wgScriptPath       = "/medien/medienwiki/wiki";		# +++++ defined in Private Settings
$wgScriptExtension  = ".php";

## The protocol and server name to use in fully-qualified URLs
#$wgServer           = "http://localhost:8888";			# +++++ defined in Private Settings

## The relative URL path to the skins directory
$wgStylePath        = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo             = "$wgStylePath/common/images/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

#$wgEmergencyContact = "";								# +++++ defined in Private Settings
#$wgPasswordSender   = "";								# +++++ defined in Private Settings

$wgEnotifUserTalk      = true; # UPO
$wgEnotifWatchlist     = true; # UPO
$wgEmailAuthentication = true;

## Database settings
#$wgDBtype           = "mysql";							# +++++ defined in Private Settings
#$wgDBserver         = "localhost";
#$wgDBname           = "";
#$wgDBuser           = "";
#$wgDBpassword       = "";

# MySQL specific settings
#$wgDBprefix         = "wki_";							# +++++ defined in Private Settings

# MySQL table options to use during installation or update
$wgDBTableOptions   = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType    = CACHE_ACCEL;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads  = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons  = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.UTF-8";

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

$wgVerifyMimeType = false;
$wgAllowExternalImages = true;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$wgCacheEpoch = max( $wgCacheEpoch, gmdate( 'YmdHis', @filemtime( __FILE__ ) ) );


# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "";										# +++++ defined in Private Settings

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "";										# +++++ defined in Private Settings

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "vector";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl  = "http://creativecommons.org/licenses/by-nc-sa/3.0/";
$wgRightsText = "Creative Commons Attribution Non-Commercial Share Alike";
$wgRightsIcon = "{$wgStylePath}/common/images/cc-by-nc-sa.png";

# Set this to true if you want detailed copyright information forms on Upload.
$wgUseCopyrightUpload = true;
# Set this to false if you want to disable checking that detailed 
$wgCheckCopyrightUpload = true;

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = -1;

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['edit'] = false;



################ ADDITIONAL SETTINGS ####################

#set default favicon
$wgFavicon = '/medien/wiki/skins/bauhausmedien/favicon_m.ico';



################ NAMESPACES ####################

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



################ EXTENSIONS ####################

# Enabled Extensions. Most extensions are enabled by including the base extension file here
# but check specific extension documentation for more details
# The following extensions were automatically enabled:
require_once( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" );
require_once( "$IP/extensions/Gadgets/Gadgets.php" );
require_once( "$IP/extensions/Nuke/Nuke.php" );
require_once( "$IP/extensions/ParserFunctions/ParserFunctions.php" );
require_once( "$IP/extensions/Renameuser/Renameuser.php" );
require_once( "$IP/extensions/Vector/Vector.php" );
require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );


# End of automatically generated settings.
# Add more configuration options below.
