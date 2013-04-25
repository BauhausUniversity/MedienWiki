<?php
/**
 * Bauhaus Medien
 * Adapted from MonoBook
 * by Michael Markert
 * http://web.uni-weimar.de/medien/wiki
 *
 * In LocalSettings.php set
 * $wgDefaultSkin = 'bauhausmedien'
 */

// check for MediaWiki environment
if( !defined( 'MEDIAWIKI' ) ) { die( -1 ); }


// define basic skin settings & css imports
class SkinBauhausMedien extends SkinBauhausMedienTemplate {

	function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$this->skinname  = 'bauhausmedien';
		$this->stylename = 'bauhausmedien';
		$this->template  = 'bauhausmedienTemplate';
	}

	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
				
		// add custom stlye
		// eg: $out->addStyle( 'bauhausmedien/_bauhausmediengmu.css', 'screen' );
	}
	
}


// override TOC and related functions
class SkinBauhausMedienTemplate extends SkinTemplate {

	// add common styles for Bauhausmedientemplate
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		// add common styles...
		$out->addStyle( 'bauhausmedien/_ext.css', 'screen' );
		$out->addStyle( 'bauhausmedien/_styles.css', 'screen' );
		$out->addStyle( 'bauhausmedien/_facultyMediaStyles.css', 'screen' );
		$out->addStyle( 'bauhausmedien/_bauhausmedien.css', 'screen' );
		$out->addStyle( 'bauhausmedien/_iPhone.css', 'only screen and (max-device-width: 480px)' );
		$out->addStyle( 'bauhausmedien/_print.css', 'print' );
		/* // add fixing css styles 
		$out->addStyle( 'bauhausmedien/IE50Fixes.css', 'screen', 'lt IE 5.5000' );
		$out->addStyle( 'bauhausmedien/IE55Fixes.css', 'screen', 'IE 5.5000' ); */
		$out->addStyle( 'bauhausmedien/IE60Fixes.css', 'screen', 'IE 6' );
		$out->addStyle( 'bauhausmedien/IE70Fixes.css', 'screen', 'IE 7' );
		//$out->addStyle( 'bauhausmedien/rtl.css', 'screen', '', 'rtl' );
	}
	
	// override tocList from Linker::Skin::SkinTemplate::SkinBauhausMedien
	// to remove <table> and replace it by a proper <div> with spectaculous eventHandlers
	// note: see http://meta.wikimedia.org/wiki/MediaWiki_FAQ#How_do_I_purge_cached_pages.3F
	// how to purge caches (required so this setting may take effect)
	//
	// also see wikibits.js:111 & :152
	function tocList($toc) {
		global $wgJsMimeType;
		$title = wfMsgHtml('toc');
		
		$tocsnippet  = '<table id="toc" class="toc" summary="' . $title .'"><tr><td>';
		$tocsnippet .= '<div id="toctitle"><h2>' . $title . "</h2></div>\n" . $toc;
		# no trailing newline, script should not be wrapped in a paragraph
		$tocsnippet .= "</ul>\n</td></tr></table>";
		$tocsnippet .=  '<script type="' . $wgJsMimeType . '">'
		. ' if (window.bauhausShowTocToggle) {'
		. ' 	var tocShowText = "' . Xml::escapeJsString( wfMsg('showtoc') ) . '";'
		. ' 	var tocHideText = "' . Xml::escapeJsString( wfMsg('hidetoc') ) . '";'
		
		. ' 	var tocShowIcon = "http://web.uni-weimar.de/medien/wiki/skins/bauhausmedien/icons/down.gif";'
		. ' 	var tocHideIcon = "http://web.uni-weimar.de/medien/wiki/skins/bauhausmedien/icons/up.gif";'
		. '		var tocClearIcon= "http://web.uni-weimar.de/medien/wiki/skins/bauhausmedien/icons/clear.gif";'
		. '		var tocResetIcon= "http://web.uni-weimar.de/medien/wiki/skins/bauhausmedien/icons/right.gif";'
		
		. ' 	bauhausShowTocToggle();'
		. ' } ';
		$tocsnippet .= "</script>\n";
		 
		return $tocsnippet;
	}

}

		
// main skin class html parser;
// extend to change templatePrfs settings
class BauhausMedienTemplate extends QuickTemplate {
	
	/**
	 * Template filter callback for bauhausmedien skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	
	var $templPrefs;
	
	function initPrfs() {
		// Default images (English)
		$this->templPrefs['myUniWortmarke']		= 'uni_wortmarke.jpg';
		$this->templPrefs['myFakWortmarke']		= 'faculty_media.png';
		$this->templPrefs['myTitleLogo']		= 'media_art_design.png';
		$this->templPrefs['myTitle']			= 'Media Art & Design';
		$this->templPrefs['mySubtitle']			= 'Media Wiki'; //z.B.: 'Interface Design / Prof. Jens Geelhaar';
		$this->templPrefs['myFakLink'] 			= 'http://www.uni-weimar.de/cms/medien.html';
		$this->templPrefs['myTitleLink']		= 'http://www.uni-weimar.de/cms/medien/medienkunstmediengestaltung.html';	// Link of $myTitle
		$this->templPrefs['myHomeURL']			= 'http://web.uni-weimar.de/medien/wiki'; // Link of $mySubtitle
		$this->templPrefs['showCCLicense']		= false;
		$this->templPrefs['favicon']			= '/bauhausmedien/favicon_m.ico';
		// Deutsch: de, de-at, de-ch, de-formal
		$this->templPrefs['myFakWortmarke_de']	= 'medien_wortmarke.jpg';
		$this->templPrefs['myTitleLogo_de']		= 'mediengestaltung.jpg';
		$this->templPrefs['myTitle_de']			= 'Medienkunst/Mediengestaltung';
		$this->templPrefs['mySubtitle_de']		= 'Medien Wiki'; //z.B.: 'Interface Design / Prof. Jens Geelhaar';
		
		// extra HTML
		$this->templPrefs['extraHTML']			= '';
	}
	
	function getTemplatePrf($name) {
		if( array_count_values($this->templPrefs) <= 0 ) { $this->initPrfs(); }
		return $this->templPrefs[$name];
	}
	function setTemplatePrf($name, $value) {
		if( array_count_values($this->templPrefs) <= 0 ) { $this->initPrfs(); }
		$this->templPrefs[$name] = $value;
	}
	
	function execute() {
		global $wgRequest;
		$this->skin = $skin = $this->data['skin'];
		$action = $wgRequest->getText( 'action' );

		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();
		
		// generate main html output
		require_once("bauhausmedienshared.html.php");

		wfRestoreWarnings();
	} // end of execute() method

	
	/*************************************************************************************************/
	function searchBox() {
		global $wgUseTwoButtonsSearchForm;
?>
	<div id="search" class="portlet">
		<!--ul><li class="level1"-->
		<div id="searchBody" class="pBody">
			<form action="<?php $this->text('wgScript') ?>" id="searchform"><div>
				<input type='hidden' name="title" value="<?php $this->text('searchtitle') ?>"/>
				<input id="searchInput" name="search" type="text"<?php echo $this->skin->tooltipAndAccesskey('search');
					if( isset( $this->data['search'] ) ) {
						?> value="<?php $this->text('search') ?>"<?php } ?> />
				<br/><input type='submit' name="go" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searcharticle') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-go' ); ?> /><?php if ($wgUseTwoButtonsSearchForm) { ?>
				<input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php //$this->msg('searchbutton') ?>"<?php echo $this->skin->tooltipAndAccesskey( 'search-fulltext' ); ?> /><?php } else { ?>

				<div><a href="<?php $this->text('searchaction') ?>" rel="search"><?php $this->msg('powersearch-legend') ?></a></div><?php } ?>

			</div>
			</form>
		</div>
		<!--/li></ul-->
	</div>
<?php
	}

	/*************************************************************************************************/
	function toolBox() {
?>
	<div class="portlet" id="p-tb">
		<ul><li class="level1dummy"><?php //$this->msg('toolbox') ?>&nbsp;<br/>
		<div class="pBody">
			<ul>
<?php
		if($this->data['notspecialpage']) { ?>
				<li class="level3" id="t-whatlinkshere"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['whatlinkshere']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-whatlinkshere') ?>><?php $this->msg('whatlinkshere') ?></a></li>
<?php
			if( $this->data['nav_urls']['recentchangeslinked'] ) { ?>
				<li class="level3" id="t-recentchangeslinked"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['recentchangeslinked']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-recentchangeslinked') ?>><?php $this->msg('recentchangeslinked') ?></a></li>
<?php 		}
		}
		if(isset($this->data['nav_urls']['trackbacklink'])) { ?>
			<li class="level3" id="t-trackbacklink"><a href="<?php
				echo htmlspecialchars($this->data['nav_urls']['trackbacklink']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-trackbacklink') ?>><?php $this->msg('trackbacklink') ?></a></li>
<?php 	}
		if($this->data['feeds']) { ?>
			<li class="level3" id="feedlinks"><?php foreach($this->data['feeds'] as $key => $feed) {
					?><a id="<?php echo Sanitizer::escapeId( "feed-$key" ) ?>" href="<?php
					echo htmlspecialchars($feed['href']) ?>" rel="alternate" type="application/<?php echo $key ?>+xml" class="feedlink"<?php echo $this->skin->tooltipAndAccesskey('feed-'.$key) ?>><?php echo htmlspecialchars($feed['text'])?></a>&nbsp;
					<?php } ?></li><?php
		}

		foreach( array('contributions', 'log', 'blockip', 'emailuser', 'upload', 'specialpages') as $special ) {

			if($this->data['nav_urls'][$special]) {
				?><li class="level3" id="t-<?php echo $special ?>"><a href="<?php echo htmlspecialchars($this->data['nav_urls'][$special]['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-'.$special) ?>><?php $this->msg($special) ?></a></li>
<?php		}
		}

		if(!empty($this->data['nav_urls']['print']['href'])) { ?>
				<li class="level3" id="t-print"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['print']['href'])
				?>" rel="alternate"<?php echo $this->skin->tooltipAndAccesskey('t-print') ?>><?php $this->msg('printableversion') ?></a></li><?php
		}

		if(!empty($this->data['nav_urls']['permalink']['href'])) { ?>
				<li class="level3" id="t-permalink"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['permalink']['href'])
				?>"<?php echo $this->skin->tooltipAndAccesskey('t-permalink') ?>><?php $this->msg('permalink') ?></a></li><?php
		} elseif ($this->data['nav_urls']['permalink']['href'] === '') { ?>
				<li class="level3" id="t-ispermalink"<?php echo $this->skin->tooltip('t-ispermalink') ?>><?php $this->msg('permalink') ?></li><?php
		}

		wfRunHooks( 'MonoBookTemplateToolboxEnd', array( &$this ) );
		wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );
?>
			</ul>
		</div>
		</li></ul>
	</div>
<?php
	}

	/*************************************************************************************************/
	function languageBox() {
		if( $this->data['language_urls'] ) {
?>
	<div id="p-lang" class="portlet">
		<ul><li class="level1"><?php $this->msg('otherlanguages') ?>
		<div class="pBody">
			<ul>
<?php		foreach($this->data['language_urls'] as $langlink) { ?>
				<li class="level2<?php //class="<?php echo htmlspecialchars($langlink['class'])?>"><?php
				?><a href="<?php echo htmlspecialchars($langlink['href']) ?>"><?php echo $langlink['text'] ?></a></li>
<?php		} ?>
			</ul>
		</div>
		</li></ul>
	</div>
<?php
		}
	}

	/*************************************************************************************************/
	function customBox( $bar, $cont ) {
?>
	<div class='generated-sidebar portlet' id='<?php echo Sanitizer::escapeId( "p-$bar" ) ?>'<?php echo $this->skin->tooltip('p-'.$bar) ?>>
		<ul><li class="level1"><?php $out = wfMsg( $bar ); if (wfEmptyMsg($bar, $out)) echo $bar; else echo $out; ?>
		<div class='pBody'>
<?php   if ( is_array( $cont ) ) { ?>
			<ul>
<?php 			foreach($cont as $key => $val) { ?>
				<li class="level2" id="<?php echo Sanitizer::escapeId($val['id']) ?>"<?php
					if ( $val['active'] ) { ?> class="active" <?php }
				?>><a href="<?php echo htmlspecialchars($val['href']) ?>"<?php echo $this->skin->tooltipAndAccesskey($val['id']) ?>><?php echo htmlspecialchars($val['text']) ?></a></li>
<?php			} ?>
			</ul>
<?php   } else {
			# allow raw HTML block to be defined by extensions
			print $cont;
		}
?>
		</div>
		</li></ul>
	</div>
<?php
	}

} // end of class


// note: don't close php ?,> here!
