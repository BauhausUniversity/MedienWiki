<?php
if ( !defined( 'MEDIAWIKI' ) ) {
        exit(1);
}
 
$wgExtensionCredits['other'][] = array(
        'path'           => __FILE__,
        'name'           => 'CheckEmailAddress',
        'author'         => 'Mirko Schiefelbein',
        'url'            => 'http://www.mediawiki.org/wiki/Extension:CheckEmailAddress',
        'descriptionmsg' => 'checkemailaddress-desc',
        'version'                =>     '0.9',
);
 
$wgExtensionMessagesFiles[ 'CheckEmailAddress' ] = dirname( __FILE__ ) . '/CheckEmailAddress.i18n.php';
$wgAutoloadClasses[ 'CheckEmailAddressHooks' ] = dirname( __FILE__ ) . '/CheckEmailAddress.hooks.php';
 
/** for future integration: CheckEmailAddress source types
 *  @{
 */
define( 'CEASRC_MSG',       0 );        ///< For internal usage
define( 'CEASRC_LOCALPAGE', 1 );        ///< Local wiki page
define( 'CEASRC_URL',       2 );        ///< Load blacklist from URL
define( 'CEASRC_FILE',      3 );        ///< Load from file
/** @}
 
/** Array of CheckEmailAddress sources */
$wgCheckEmailAddressDomainSources = array();
 
/** Array of CheckEmailAddress names */
$wgCheckEmailAddressNameSigns = array();
 
/** Hooks */
$wgHooks['AbortNewAccount'][] = 'CheckEmailAddressHooks::abortNewAccountDomain';
$wgHooks['AbortNewAccount'][] = 'CheckEmailAddressHooks::abortNewAccountName';
