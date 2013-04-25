<?php
if ( !defined( 'MEDIAWIKI' ) ) {
        die( 'This file is a MediaWiki extension, it is not a valid entry point' );
}
 
$wgExtensionCredits['parserhook'][] = array(
    'name'=>'Edit Section Link Transform',
    'url'=>'http://www.mediawiki.org/wiki/Extension:Edit_Section_Link_Transform',
    'author'=>'Tim Laqua, t.laqua at gmail dot com',
    'description'=>'Replaces the [edit] EditSection link in articles with an icon.',
    'version'=>'1.0'
);
 
$wgHooks['ParserAfterTidy'][]  = 'wfEditSectionLinkTransform'; 
 
function wfEditSectionLinkTransform(&$parser, &$text) {
    global $wgEditSectionIcon;
    $text = preg_replace("/<span class=\"editsection\">\[<a href=\"(.+)\" title=\"(.+)\">".wfMsg('editsection')."<\/a>\]<\/span>/i", "<span class=\"editsectionIcon\"><a href=\"$1\" title=\"$2\"><img src=\"$wgEditSectionIcon\" border=\"0\" alt=\"$2\"></a></span>",$text);
     	    #return false;
#}
    return true;
}
