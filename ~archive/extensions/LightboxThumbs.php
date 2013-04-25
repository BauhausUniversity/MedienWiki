<?php
/*
 * LightboxThumbs extension
 * by Alexander, http://www.mediawiki.org/wiki/User:Alxndr
 * Changes/Bug Fixes made by Kinsey Moore and Rgoodermote
 * Changes/Compatibility for MW 1.16 by Michael Markert
 *
 * Displays thumbnailed images full-size in window 
 * using Lokesh Dhakar's Lightbox 2 (http://www.lokeshdhakar.com/projects/lightbox2/)
 *
 * Licensed under Creative Commons Attribution-NonCommercial license 3.0: 
 * http://creativecommons.org/licenses/by-nc/3.0/
 *
 * Requirements: MW 1.16 (older versions of this extension still available)
 *               Lightbox 2
 *
 * Bugs: will make very large images take over your screen! doesn't do any resizing
 *       if there are multiple galleries on one page, they are treated as being part of one big slideshow
 *       will probably break on images with a / or ? in the name
 *       probably eats a lot of resources if you have a ton of thumbnails in a page...
 * 
 * Todo: make galleries register as separate slideshows
 *       only add hook if there's a thumbnail in the page
 *       change thumbnail caption source to preserve markup, like galleries
 *       make Lightbox not react to right-click
 */
 
if ( !defined( 'MEDIAWIKI' ) )
    die( 'This is a MediaWiki extension, and must be run from within MediaWiki.' );
 
$wgExtensionCredits['other'][] = array(
    'name'        => 'LightboxThumbs',
    'url'         => 'http://www.mediawiki.org/wiki/Extension:LightboxThumbs',
    'author'      => '[http://www.mediawiki.org/wiki/User:Alxndr Alexander], (alxndr+mediawiki@gmail.com) and others',
    'description' => 'Displays full-size images with [http://www.lokeshdhakar.com/projects/lightbox2/ Lightbox 2] when clicking on thumbnails.',
    'version'     => '0.1.4.1'
);
 
 
if ($lightboxThumbsFilesDir) ## don't add the hook unless we have a directory to look at
{
    $lightboxThumbsFilesDir = rtrim(trim($lightboxThumbsFilesDir),'/'); # strip whitespace, then any trailing /
    ## we'd rather subclass Linker and change how it builds thumbnails and galleries, but we can't, so modifying the HTML once it's built will have to suffice
    $wgHooks['BeforePageDisplay'][] = 'efBeforePageDisplay';
}
 
function efDebugVar($varName,$var)
{
    return "\n\n<!--\n$varName: ".str_replace('--','__',print_r($var,true))."\n-->\n\n";
}
 
 
# debug
#$lightboxThumbsDebug = true;
# .($lightboxThumbsDebug?efDebugVar('$matches',$matches).efDebugVar('$titleObj',$titleObj).efDebugVar('$image',$image):'');
# .($lightboxThumbsDebug?efDebugVar('$matches',$matches).efDebugVar('$titleObj',$titleObj).efDebugVar('$image',$image).efDebugVar('$wgContLang->namespaceNames',$wgContLang->namespaceNames):'');
 
 
function efRewriteThumbImage($matches)
{
    // see comments in first $pattern in efBeforePageDisplay() for what the pieces of $matches are
    global $wgOut, $lightboxThumbsDebug;
    if ($lightboxThumbsDebug) { global $wgContLang; }
 
    // get the image object ($3 for gallery and $7 for single images)
    $titleObj = Title::newFromText(rawurldecode($matches[3]?$matches[3]:$matches[7]));
        $image = wfFindFile($titleObj,false,false,true); ## wfFindFile($titleObj,false,false,true) to bypass cache

    if($matches[1]) { 
        // is gallery:
            return $matches[2].' href="'.$image->getURL().'" class="image" rel="lightbox[gallery]" title="'
                        .strip_tags($matches[5])        // strip tags for the title! (eg.for Special:NewFiles)
                        .'" '.$matches[4].$matches[5]."</div>"
                .($lightboxThumbsDebug?efDebugVar('$matches',$matches):'');
    } else {
        // is single image:
        $caption = ((!$matches[13] || $matches[13]=="")?$matches[15]:$matches[13]);
        return $matches[6].' href="'.$image->getURL().'" class="image" rel="lightbox" title="'
                .strip_tags($caption)
                .'" '.$matches[10].$matches[11].$matches[12].$matches[13].$matches[14]
                        .($lightboxThumbsDebug?efDebugVar('$matches',$matches):'');
        }
}
 
 
 
function efBeforePageDisplay($out)
{
    global $lightboxThumbsFilesDir, $wgContLang;
 
    $out->addScript('<script type="text/javascript" src="'.$lightboxThumbsFilesDir.'/js/prototype.js"></script>');
    $out->addScript('<script type="text/javascript" src="'.$lightboxThumbsFilesDir.'/js/scriptaculous.js?load=effects,builder"></script>');
//    $out->addScript('<script type="text/javascript" src="'.$lightboxThumbsFilesDir.'/js/scriptaculous.js?load=effects,builder,dragdrop"></script>');
    $out->addScript('<script type="text/javascript" src="'.$lightboxThumbsFilesDir.'/js/builder.js"></script>');
 
//    $out->addScript('<script type="text/javascript" src="'.$lightboxThumbsFilesDir.'/js/lightbox%20(uncompressed).js"></script>');
    $out->addScript('<script type="text/javascript" src="'.$lightboxThumbsFilesDir.'/js/lightbox.js"></script>');
    $out->addScript('<link rel="stylesheet" href="'.$lightboxThumbsFilesDir.'/css/lightbox.css" type="text/css" media="screen" />'); # addStyle() is a pain
    
    ## ideally we'd do this with XPath, but we'd need valid XML for that, so we'll do it with some ugly regexes
    ## (could use a regex to pull out all div.thumb, maybe they're valid XML? ...probably not)

        ## regex for thumbnails for > MW 1.16
         ## <a href="/wiki/File:Test.jpg" class="image"><img alt="" src="/wiki/images/thumb/Test.jpg/120px-Test.jpg" width="120" height="120"></a>
     $pattern = '/
                (?(?=<div\s*class="gallerybox)                                  ## IF GALLERY THEN
 
                                <div\s*class="(gallery).+?                                      #$1: gallery
                                (<a[^>]+?)                                                        #$2: opening a tag
                                \s*href="[^"]*(?:'.urlencode($wgContLang->namespaceNames[6]).')
                                ([^"\/]+)                                                  #$3: Image Name
                                "\s*class="image"\s*                                                     
                                ([^>]*>.+?<div\s*class="gallerytext">)                            #$4: end of open a through start of caption
                                \s*(?:<p>\s*)?
                                (.+?)\n?<[^<>]+>                                            #$5: caption is raw HTML (wrap in php)
                                (?:\s*<\/p>|<br\s*\/?>)?\s*<\/div>\s*<\/div>
 
                        |                                                       ## ELSE
 
                                                                                                #$1 to $5 unmatched (see above)
                                (<a[^>]+?)                                                        #$6: opening a tag
                                \s*href="[^"]*(?:'.urlencode($wgContLang->namespaceNames[6]).')
                                ([^"\/]+)                                                  #$7: imageName
                                "\s*class="image"\s*
                                (title="([^"]+)")?                                               #$8 & $9: optional title ($8:HTML, $9:TXT)
                                ([^>]*>)                                                  #$10: remainder of opening a tag
                                \s*
                                (<img[^"])                                                      #$11: the img start tag
                                (alt=")                                                            #$12: the img alt tag
                                ([^"]{0,400})                                                      #$13: the img alt tag = Title
                                ([^>]*>)                                                  #$14: the img end
                                (?=.*thumbcaption.+?(?:\/div>)(.+?)(?:<\/div>)|)               #$15: Thumbcaption (preceeds 12 if not empty)
 
                        )                                                       ## ENDIF
                        /sx';
 
    $thumbnailsDone = preg_replace_callback($pattern, 'efRewriteThumbImage', $out->getHTML());
    $out->clearHTML();
    $out->addHTML($thumbnailsDone);
 
    return true;
}