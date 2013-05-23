<?php
/**
 * BUW Skin
 * Vector based skin for Bauhaus-Universität Weimar
 * by Michael Markert
 *
 *
 * @file
 * @ingroup Skins
 */

if( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @ingroup Skins
 */
class SkinBUW extends SkinVector {
	var $skinname = 'BUW', $stylename = 'BUW',
		$template = 'VectorTemplate', $useHeadElement = true;
}
