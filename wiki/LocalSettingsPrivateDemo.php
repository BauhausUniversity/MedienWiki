<?php

# PRIVATE SETTINGS.
# MAKE SURE THIS FILE IS EXCLUDED FROM ANY VERSION CONTROL SYSTEM

$wgSitename 		= "Medien Wiki";
$wgServer           = "http://localhost:8888";
$wgScriptPath 		= "/medienwiki/wiki";

$wgEmergencyContact = "…@uni-weimar.de";
$wgPasswordSender 	= "…@uni-weimar.de";

## Database settings
$wgDBtype 			= "mysql";
$wgDBserver         = "localhost";
$wgDBname           = "mydbname";
$wgDBuser           = "root";
$wgDBpassword       = "root";

# MySQL specific settings
$wgDBprefix 		= "wki_";

## Shared memory settings
$wgMainCacheType    = CACHE_ACCEL;
$wgMemCachedServers = array();

# MediaWiki secret key
$wgSecretKey 		= "";
$wgUpgradeKey 		= "";

# Email Domain Check
$wgEmailDomain[] 	= 'domain.tld';

# Maps
# Your Google Maps API key
$egGoogleMapsKey = ""; 
# Your Yahoo! Maps API key
$egYahooMapsKey = "";

?>
