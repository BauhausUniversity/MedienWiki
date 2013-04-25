<?php
/*
 * FancyBoxThumbsK extension
 * Displays thumbnailed images in a Mac-style "lightbox" that floats overtop of web page.
 *
 * by [http://www.gilluminate.com Jason Gill]
 *
 * modified by [http://idea-sketch.com Uwe Sch�tzenmeister], [http://krusher.net Krusher], [http://pnnl.gov Peter Ellis], Aev, Schu
 * [http://www.audiocommander.de Michael Markert]
*/

/*
 * Uses: FancyBox - jQuery Plugin
 * Simple and fancy lightbox alternative
 *
 * Examples and documentation at: http://fancybox.net
 * 
 * Copyright (c) 2008 - 2011 Janis Skarnelis
 * That said, it is hardly a one-person project. Many people have submitted bugs, code, and offered their advice freely.
 * Their support is greatly appreciated.
 * 
 * Version: 1.3.5 (10/20/2011) [branch from official version]
 * Requires: jQuery v1.3+
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
*/
 
if ( !defined( 'MEDIAWIKI' ) )
    die( 'This is a MediaWiki extension, and must be run from within MediaWiki.' );
 
//Register Credits
$wgExtensionCredits['other'][] = array(
    'name'        => 'FancyBoxThumbs',
    'url'         => 'http://www.mediawiki.org/wiki/Extension:FancyBoxThumbs',
    'author'      => '[http://www.gilluminate.com Jason Gill]',
    'description' => 'Displays thumbnailed images in a Mac-style "lightbox" that floats overtop of web page. A simple and fancy lightbox alternative',
    'version'     => '0.8'
);
 
$wgHooks['BeforePageDisplay'][] = 'efBeforePageDisplay';
 
function efBeforePageDisplay($out)
{	
    global $wgScriptPath, $wgTitle, $wgRequest;
	
	// Don't load if in the Special namespace (to prevent clobbering Semantic Forms or other extensions that load jQuery).
	// Also don't load if we're doing any sort of action on the page.
	$action = $wgRequest->getVal("action");
	if($wgTitle->getNsText() != "Special" && $action != "formedit")
	{
		$FBT_Dir = '/extensions/FancyBoxThumbs/fancybox';
		//Only load jQuery if for some reason it's not present
		$out->addScript('<script type="text/javascript">var jQueryScriptOutputted = false;function initJQuery() {if (typeof(jQuery) == "undefined") {if (! jQueryScriptOutputted) {jQueryScriptOutputted = true;document.write(\'<scr\'+\'ipt type="text/javascript" src="'.$wgScriptPath.$FBT_Dir.'/jquery.min.js"></scr\'+\'ipt>\');}setTimeout("initJQuery()", 50);}}initJQuery();</script>');
		$out->addScriptFile($wgScriptPath.$FBT_Dir.'/jquery.fancybox-1.3.4.js');
		$out->addScript('<link rel="stylesheet" href="'.$wgScriptPath.''.$FBT_Dir.'/jquery.fancybox-1.3.4.css" type="text/css" />');
	 
		##uses jquery to rewrite the href, rather than traditional php methods that can break the CMS nature of WikiMedia
		$out->addScript('<script type="text/javascript">'
						.'jQuery.noConflict();'
						.'(function($) {'
							.'$(document.body).ready(function() {'
								.'$("a.image").each(function(){'
									.'var img_split1 = $(this).children().first().attr("src").split("/thumb");'
									.' if(img_split1[1] == null) { img_split1[1] = img_split1[0]; img_split1[0] = \'\';};' // Not a thumb but a full image
									.' var img_type = img_split1[1].substr(img_split1[1].length -4);' // cut the last 4 (!) characters to fetch .jpg and jpeg
									.' var img_split2 = img_split1[1].split(img_type);'
									.' var img_src = img_split1[0]+img_split2[0]+"."+img_type;'
									.' var img_src = img_src.replace("..", ".");' // change ..jpg to .jpg but do not change .jpeg
									.' var pieces = img_src.split(\'/\');'
									.' var imgTitle = $(this).attr("title");'
									.' imgTitle = (imgTitle ? (imgTitle+"<br />") : "");'
									.' $(this).attr("title", imgTitle + "Origin: <a style=\"color:#888888;\" href=\"http://www.uni-weimar.de/medien/wiki/File:"+pieces[pieces.length-1]+"\">" + pieces[pieces.length-1] + "</a>");'
//									.' $(this).attr("title", $(this).attr("title") + "<br />Origin: <a style=\"color:#888888;\" href=\"http://www.uni-weimar.de/medien/wiki/File:"+pieces[pieces.length-1]+"\">" + pieces[pieces.length-1] + "</a>");'
									.' $(this).attr("href", img_src);'
									.' $(this).attr("rel", "group");'
								.'});'
								.'$("a.image").fancybox({"transitionIn":"elastic","transitionOut":"elastic","titlePosition":"inside"});'
							.'});'
						.'})(jQuery)'
						.'</script>');
	}
 
    return true;
}