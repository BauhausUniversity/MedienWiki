<?php

// require_once( "$IP/extensions/EmailDomainCheck/EmailDomainCheck.php" );
// $wgEmailDomain = 'uni-weimar.de';

/**
 * Extension checks that registering users
 * are from a specific email domain
 * during account creation.
 *
 * @package MediaWiki
 * @subpackage Extensions
 * @author wookienz <wookienz@gmail.com>
 */
 
/**
 * email domain that user must come from
 */
 
// $wgEmailDomain = 'somedomain.org';
$wgExtensionMessagesFiles['EmailDomainCheck'] = dirname(__FILE__) . '/EmailDomainCheck.i18n.php';
 
$wgExtensionCredits['other'][] = array(
       'path' => __FILE__,
       'name' => 'Email Domain Check',
       'author' => 'Wookienz',
       'url' => 'https://www.mediawiki.org/wiki/Extension:EmailDomainCheck',
       'descriptionmsg' => 'emaildomaincheck-desc',
);
 
 
$wgHooks['AbortNewAccount'][] = 'efEmailDomainCheck';
 
/**
 * Hooks the account creation process,
 * will cancel the prcoess if the dmain is not correct.
 *
 * @param User $user User object being created
 * @param string $error Reference to the error message to show
 * @return bool
 */
 
 
function efEmailDomainCheck( $user, &$error ) {
        global $wgEmailDomain;
 
        if ( isset( $wgEmailDomain ) ) {
 
                list( $name, $host ) = explode( "@", $user->getEmail() );
                //if ( stripos( $host, $wgEmailDomain ) != false ) { // use this line to allow subdomains of $wgEmailDomain
                //if ( $host == $wgEmailDomain ) {
				if (in_array($host, $wgEmailDomain)) {
                        return true;
                } else {
                        $error = wfMsgHtml( 'emaildomaincheck-error', $wgEmailDomain );
                        return false;
                }
        }
}
