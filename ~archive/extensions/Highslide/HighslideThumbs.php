<?php
/*
 * HighslideThumbs extension
 * by TomFourWinds, http://www.mediawiki.org/wiki/User:TomFourWinds
 * Displays thumbnailed images full-size in window using Highslide JS (http://www.highslide.com/).
 * Licensed under Creative Commons Attribution-NonCommercial license 3.0: http://creativecommons.org/licenses/by-nc/3.0/
 *
 * Bugs: will make very large images take over your screen! doesn't do any resizing
 *       if there are multiple galleries on one page, they are treated as being part of one big slideshow
 *       will probably break on images with a / or ? in the name
 *       probably eats a lot of resources if you have a ton of thumbnails in a page...
 *       doesn't work with SVGs (?)
 *       doesn't work on MW before 1.9 (?)
 *
 * Todo: Make galleries show in different slideshows
 */

if ( !defined( 'MEDIAWIKI' ) )
    die( 'This is a MediaWiki extension, and must be run from within MediaWiki.' );

$wgExtensionCredits['other'][] = array(
    'name'        => 'HighslideThumbs',
    'url'         => 'none',
    'author'      => 'http://www.mediawiki.org/wiki/User:TomFourWinds',
    'description' => 'Displays full-size images with [http://www.highslide.com/ HighSlide JS] when clicking on thumbnails.',
    'version'     => '0.1.0'
);

if ($highslideFilesDir) ## don't add the hook unless we have a directory to look at
{
    $highslideFilesDir = rtrim(trim($highslideFilesDir),'/'); # strip whitespace, then any trailing /
    ## we'd rather subclass Linker and change how it builds thumbnails and galleries, but we can't, so modifying the HTML once it's built will have to suffice
    $wgHooks['BeforePageDisplay'][] = 'efHighslideBeforePageDisplay';
}

function efDebugVar($varName,$var)
{
    return "\n\n<!--\n$varName: ".str_replace('--','__',print_r($var,true))."\n-->\n\n";
}

## TODO merge two efRewrite fxns into one, and send it normalized data from callback fxns which will interpret the $matches from each preg_replace?
## ...that'd make it easier to group galleries into lightbox slideshows
function efHighslideRewriteThumbImage($matches)
{
    ## see comments in first $pattern in efHighslideBeforePageDisplay() for what the pieces of $matches are
    global $wgOut, $lightboxThumbsDebug;
    if ($lightboxThumbsDebug) { global $wgContLang; }
    $titleObj = Title::newFromText(rawurldecode($matches[2]));
    $image = wfFindFile($titleObj,false,false,true); ## wfFindFile($titleObj,false,false,true) to bypass cache
    return $matches[1].' href="'.$image->getURL().'" onclick="return hs.expand(this, config_images);" class="image" title="'
        .$matches[3]
        .'" '.$matches[4].$matches[5].$matches[6]
        .($lightboxThumbsDebug?efDebugVar('$matches',$matches).efDebugVar('$titleObj',$titleObj).efDebugVar('$image',$image).efDebugVar('$wgContLang->namespaceNames',$wgContLang->namespaceNames):'');
}

function efHighslideRewriteGalleryImage($matches)
{
    ## see comments in second $pattern in efHighslideBeforePageDisplay() for what the pieces of $matches are
    global $wgOut, $lightboxThumbsDebug;
    $titleObj = Title::newFromText(rawurldecode($matches[2]));
    $image = wfFindFile($titleObj,false,false,true);
    return $matches[1].' href="'.$image->getURL().'" onclick="return hs.expand(this, config_images);" class="image" rel="lightbox[gallery]" title="'
       .$matches[4]
        .'" '.$matches[3].$matches[4]."</div>"
        .($lightboxThumbsDebug?efDebugVar('$matches',$matches).efDebugVar('$titleObj',$titleObj).efDebugVar('$image',$image):'');
}

function efHighslideBeforePageDisplay($out)
{
    global $highslideFilesDir, $wgContLang;
    $out->addScript('<script type="text/javascript" src="'.$highslideFilesDir.'/highslide-full.js"></script>');
    $out->addScript('<script type="text/javascript" src="'.$highslideFilesDir.'/highslide-extra.js"></script>');
    $out->addScript('<script type="text/javascript" >hs.graphicsDir = "'.$highslideFilesDir.'/graphics/";var config_images = {slideshowGroup: "images",transitions: ["expand", "crossfade"],numberPosition: "caption"};</script>');
    $out->addScript('<link rel="stylesheet" type="text/css" href="'.$highslideFilesDir.'/highslide.css" />');
    $out->addScript('<link rel="stylesheet" type="text/css" href="'.$highslideFilesDir.'/highslide-extra.css" />');

    ## ideally we'd do this with XPath, but we'd need valid XML for that, so we'll do it with some ugly regexes
    ## (could use a regex to pull out all div.thumb, maybe they're valid XML? ...probably not)

    ## regex for thumbnails
    $pattern = '/(<a[^>]+?)                           # $1: start of opening <a> tag through start of href attribute in <a> tag, so we can keep it intact
                 \s*href="[^"]*(?:'.urlencode($wgContLang->namespaceNames[6]).'): # dont care about start of original link href...
                 ([^"\/]+)                            # $2: ...but end is wiki name for the image
                 "\s*class="image"\s*title="          #
                 ([^"]+)                              # $3: link title becomes image caption
                 "\s*                                 #
                 ([^>]*>)                             # $4: remainder of opening <a> tag
                 \s*                                  #
                 (<img[^>]+?class="thumbimage")       # $5: the img start tag itself
                 ([^>]*>)                             # $6: the img end
                /x';
    $thumbnailsDone = preg_replace_callback($pattern, 'efHighslideRewriteThumbImage', $out->getHTML());

    ## regex for galleries
    $pattern = '/(<div\s*class="gallerybox".+?div\s*class="thumb".+?) # $1: div.gallerybox opening tag through href attribute, so we can keep it intact
                 \s*href="[^"]+"\s*class="image"\s*                   # this is getting replaced
                 title="([^"]+)"                                      # $2: link title attribute holds wiki name for the image
                 ([^>]*>.+?<div\s*class="gallerytext">)               # $3: end of open <a> through start of caption
                 \s*(?:<p>\s*)?                                       #
                 (.+?)                                                # $4: caption is raw HTML... (may choke if contains an ending div)
                 (?:\s*(<\/p>|<br\s*\/?>))?\s*<\/div>                 #
                /sx';
    $allDone = preg_replace_callback($pattern, 'efHighslideRewriteGalleryImage', $thumbnailsDone);
    $out->clearHTML();
    $out->addHTML($allDone);

    return true;
}