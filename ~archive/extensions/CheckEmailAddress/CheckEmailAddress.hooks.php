<?php
class CheckEmailAddressHooks {
 
        /* Check Domain if once- or trash-mail
        */
        public static function abortNewAccountDomain ( $user, &$abortError ) {
                global $wgUser, $wgCheckEmailAddressDomainSources;
 
                $fulladdress = $user->getEmail();
                $domainat = stristr( $fulladdress, '@' );
                $domain = mb_strtolower( $domainat );
 
                if( !is_array( $wgCheckEmailAddressDomainSources ) || count( $wgCheckEmailAddressDomainSources ) <= 0 ) {
                        return '';
                }
 
                if( $wgCheckEmailAddressDomainSources[ 'type' ] == CEASRC_FILE ) {
                        $srcfile = $wgCheckEmailAddressDomainSources[ 'src' ];
 
                        if( file_exists( $srcfile ) ) {
                                $domlines = file( $srcfile );
                        } else {
                                return true;
                        }
 
                        foreach( $domlines as $domline ) {
                                $domline = rtrim( $domline, "\r\n");
                                $entry = "/@".$domline."/";
                                if( preg_match( $entry, $domain ) ) {
                                        $abortError = wfMsg( 'checkemailaddress-domainerror' );
                                        unset( $domline );
                                        return false;
                                }
                        }
                }
                unset( $domline );
                return true;
        }
 
 
        /* Check Name if spammy indicators
        */
        public static function abortNewAccountName ( $user, &$abortError ) {
                global $wgUser, $wgCheckEmailAddressNameSigns;
 
                $fulladdress = $user->getEmail();
                $at = "@";
                $atpos = strpos( $fulladdress, $at );
                $nameat = substr( $fulladdress, 0, $atpos );
                $name = mb_strtolower( $nameat );
 
                if( !is_array( $wgCheckEmailAddressNameSigns ) || count( $wgCheckEmailAddressNameSigns ) <= 0 ) {
                        return '';
                }
 
                foreach( $wgCheckEmailAddressNameSigns as $key => $value ) {
                        $sign = $value[ 'sign' ];
                        $maxcount = $value[ 'maxcount' ];
                        $signcount = substr_count( $name, $sign );
 
                        if( $signcount >= $maxcount ) {
                                $abortError = wfMsg( 'checkemailaddress-nameerror' );
                                unset( $value );
                                return false;
                        }
                }
                unset( $value );
                return true;
        }
}