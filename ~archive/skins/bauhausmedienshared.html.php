<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="<?php $this->text('xhtmldefaultnamespace') ?>" <?php
	foreach($this->data['xhtmlnamespaces'] as $tag => $ns) {
		?>xmlns:<?php echo "{$tag}=\"{$ns}\" ";
	} ?>xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
	<head>
		<meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
		<link rel="shortcut icon" href="<?php $this->text('stylepath'); echo $this->getTemplatePrf('favicon'); ?>" />
		
		<?php $this->html('headlinks') ?>
		<title><?php $this->text('pagetitle') ?></title>
		
		<link rel="copyright" href="http://www.uni-weimar.de/web/impressum" title="Angaben zum Copyright" />
		<meta name="KEYWORDS" content="Design,concepts,design,information,Media,Interaction,digital,Mobile,Interfaces,based,Screen,areas,central,addressed,group,focus,Architecture,News,Medieninformatik,Mediengestaltung,Informatik,Webtechnologien,CSCW,Mediensysteme,Medienkultur,Medien,Space,Bauhaus,Bauhaus-Universität,University,Urban,corresponding,implement,develop,user,friendly,applications,Group,Interface,Methods,Research,main,interest,that,enable,requires,availability,adequate,Home,interfaces,ubiquitous,environments,facilitate,access,interactive,networked,Knowledge,Moden,Erscheinungsbilder,Umgebungen,Experimentelles Radio,Bauhaus,fm" />
		
		<meta name="DEBUG" content="<?php global $wgLang; echo "userLang: " . $wgLang->getCode(); ?>" />
		<?php $this->html('csslinks') ?>

		<!--[if lt IE 7]><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/IEFixes.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"></script>
		<meta http-equiv="imagetoolbar" content="no" /><![endif]-->

		<?php print Skin::makeGlobalVariablesScript( $this->data ); ?>

		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
		<!-- Head Scripts -->
<?php $this->html('headscripts') ?>
<?php	if($this->data['jsvarurl']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl') ?>"><!-- site js --></script>
<?php	} ?>
<?php	if($this->data['pagecss']) { ?>
		<style type="text/css"><?php $this->html('pagecss') ?></style>
<?php	}
		if($this->data['usercss']) { ?>
		<style type="text/css"><?php $this->html('usercss') ?></style>
<?php	}
		if($this->data['userjs']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs') ?>"></script>
<?php	}
		if($this->data['userjsprev']) { ?>
		<script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php	}
		if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
		
		<!-- load additional js libs -->
		<?php/* ----------------- From here -------------------- */?>
		<!--script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/compressed/jquery.min.js" type="text/javascript"></script-->
		<script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/prototype.js" type="text/javascript"></script>
		<!--script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/scriptaculous.js" type="text/javascript"></script-->
		<script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/scriptaculous.js?load=effects,builder,dragdrop" type="text/javascript"></script> 
		<!--script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/compressed/dragdrop.js" type="text/javascript"></script-->
		<?php/* ----------------- To here -------------------- */ ?>		<!--script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/_bauhausmedien.js" type="text/javascript"></script-->
		<script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/_bauhausmedien.dev.js" type="text/javascript"></script>
		<script src="<?php $this->text('stylepath') ?>/bauhausmedien/scripts/compressed/jquery-ui-custom.js" type="text/javascript"></script>
		
	</head>


<body<?php if($this->data['body_ondblclick']) { ?> ondblclick="<?php $this->text('body_ondblclick') ?>"<?php } ?>
<?php if($this->data['body_onload']) { ?> onload="<?php $this->text('body_onload') ?>"<?php } ?>
 class="mediawiki <?php $this->text('dir') ?> <?php $this->text('pageclass') ?> <?php $this->text('skinnameclass') ?>">


<?php
	/**** Additional Top Items ****/

	// get images (en images)
	$myUniWortmarke = $this->getTemplatePrf('myUniWortmarke');
	$myFakWortmarke = $this->getTemplatePrf('myFakWortmarke');
	$myTitleLogo 	= $this->getTemplatePrf('myTitleLogo');
	// get text
	$myTitle	 	= $this->getTemplatePrf('myTitle');
	$mySubtitle 	= $this->getTemplatePrf('mySubtitle');
	// get links
	$myFakLink		= $this->getTemplatePrf('myFakLink');
	$myTitleLink	= $this->getTemplatePrf('myTitleLink');
	// get selected language and override
	global $wgLang;
	$selectedLanguage = $wgLang->getCode();
	if($selectedLanguage == "de" || $selectedLanguage == "de-at" || $selectedLanguage == "de-ch" || $selectedLanguage == "de-formal") {
		$myFakWortmarke = $this->getTemplatePrf('myFakWortmarke_de');
		$myTitleLogo 	= $this->getTemplatePrf('myTitleLogo_de');
		$myTitle	 	= $this->getTemplatePrf('myTitle_de');
		$mySubtitle 	= $this->getTemplatePrf('mySubtitle_de');
	}
	// inject extraHTML Box (at the end)
	$extraHTML 		= $this->getTemplatePrf('extraHTML');
?>

<div id="logo1"><a href="http://www.uni-weimar.de"><img src="<?php $this->text('stylepath'); ?>/bauhausmedien/logos/<?php echo $myUniWortmarke; ?>" alt="Bauhaus-Universität Weimar" /></a><br /><a href="<?php echo $myFakLink; ?>"><img src="<?php $this->text('stylepath') ?>/bauhausmedien/logos/<?php echo $myFakWortmarke; ?>" /></a></div><!-- logo1 -->

<div id="mglogos">
<div id="logo2"><a href="<?php echo $myTitleLink; ?>"><img src="<?php $this->text('stylepath') ?>/bauhausmedien/logos/<?php echo $myTitleLogo; ?>" alt="<?php echo $myTitle; ?>" /></a></div><!-- logo2 -->

<div id="logo3"><a href="<?php echo $this->getTemplatePrf('myHomeURL'); ?>"><?php echo $mySubtitle;?></a></div><!-- logo3 --> 
</div>

<?php	/******************************	?>


<div id="searchBox"><?php $this->searchBox();?></div>

<!-- Sidebar ==================================================================================== -->
<div id="globalnav">
	
	<!-- Toggle Sidebar Button -->
	<div id="toggleSidebarButton"><a href="javascript:toggleSidebar();"><img src="<?php $this->text('stylepath') ?>/bauhausmedien/icons/right.gif" border="0" alt="toggle Sidebar" /></a></div>
		
	<!-- Sidebar Navigation, Search, Toolbox ==================================================== -->
	<script type="<?php $this->text('jsmimetype') ?>"> if (window.isMSIE55) fixalpha(); </script>
<?php
   
		$sidebar = $this->data['sidebar'];
		
		// draw items
		foreach ($sidebar as $boxName => $cont) {
			if(( $boxName != 'TOOLBOX' ) && ( $boxName != 'SEARCH' ) && ( $boxName != 'LANGUAGES')) {
				$this->customBox( $boxName, $cont );
			}
		}

		// Hide toolBox for anonymous users
        global $wgUser;
        if($wgUser->isLoggedIn()) {
			$this->toolBox();
		}
?>

	<!-- Personal Tools ========================================================================= -->
	<div class="portlet" id="p-personal">
		<div class="pBody">
		<ul>	
			<li class="level2"><?php //$this->msg('personaltools') ?>&nbsp;<br/>
			<ul>
<?php 		if($wgUser->isLoggedIn()) {
				foreach($this->data['personal_urls'] as $key => $item) { ?>
				<li class="level3" <?php
					if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
				echo htmlspecialchars($item['href']) ?>"<?php echo $skin->tooltipAndAccesskey('pt-'.$key) ?><?php
				if(!empty($item['class'])) { ?> class="<?php
				echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
				echo htmlspecialchars($item['text']) ?></a></li>
<?php			} 
			} else { 
				global $wgScriptPath; ?>
				<li class="level3"><a href="<?php echo($wgScriptPath);?>/Special:UserLogin?returnto=<?php echo $this->text('title'); ?>">Log in</a></li>
<?php		} ?>
			</ul>
			</li>
		</ul>
		</div> <!-- id: pBody-->
	</div> <!-- id: portlet.p-personal -->
	

</div><!-- id: globalnav ======================================================================== -->
*/ ?>


<div id="globalWrapper">
	<div id="column-content">
		
	<div id="content">
		<a name="top" id="top"></a>
		<?php if($this->data['sitenotice']) { ?>
			<div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
			
		<h1 id="firstHeading" class="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>
		
		<div id="bodyContent">
			<?php /*<h3 id="siteSub"><?php $this->msg('tagline') ? ></h3> */ ?>
			<div id="contentSub"><?php $this->html('subtitle') ?></div>
			<?php if($this->data['undelete']) { ?>
				<div id="contentSub2"><?php $this->html('undelete') ?></div><?php } ?>
			<?php if($this->data['newtalk'] ) { ?>
				<div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
			<?php /* if($this->data['showjumplinks']) { ?>
				<div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#column-one"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } */ ?>
				
			<!-- start content -->
			<?php $this->html('bodytext') ?>
			<p>&nbsp;</p>
			<?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
			<!-- end content -->
			
			<?php if($this->data['dataAfterContent']) { $this->html ('dataAfterContent'); } ?>
			<div class="visualClear"></div>
			
			<div id="footer">
			<?php /*
				if($this->data['poweredbyico']) { ?>
					<div id="f-poweredbyico"><?php $this->html('poweredbyico') ?></div>
			<?php 	} */
				if($this->data['copyrightico']) { 
					if($this->getTemplatePrf('showCCLicense') == true) {?>
						<div id="f-copyrightico"><?php $this->html('copyrightico') ?></div>
			<?php	}
				} 		?>
			
			<?php /*<div id="signature"><p>(CC) Faculty of Media - except where stated / <a href="http://www.uni-weimar.de/cms/index.php?id=5" title="Kontaktseite">Contact</a> / <a href="http://www.uni-weimar.de/cms/index.php?id=49" title="zum Impressum">Imprint</a></p></div><!-- signature --> <?php */ ?>
			<?php
			global $wgArticle; 
			$edityear = "2010";
			if($wgArticle) {
				$edityear = $wgArticle->getTimeStamp();
				$edityear = substr($edityear,0,4);
			}
			?> 
			<div id="signature"><p>&copy; <? echo $edityear; ?> Faculty of Media, Bauhaus-Universit&auml;t Weimar - except where stated otherwise / <a href="http://www.uni-weimar.de/cms/index.php?id=5" title="Kontaktseite">Contact</a> / <a href="http://www.uni-weimar.de/cms/index.php?id=49" title="zum Impressum">Imprint</a><br/>If you suspect a copyright violation please contact the <a href="&#x6d;&#97;&#105;&#108;&#116;&#x6f;&#58;&#x6d;&#x69;&#x63;&#x68;&#97;&#101;&#x6c;&#x2e;&#109;&#x61;&#x72;&#107;&#101;&#114;&#x74;&#x40;&#117;&#110;&#105;&#45;&#x77;&#x65;&#105;&#x6d;&#97;&#114;&#46;&#x64;&#x65;">Wiki-Administrator</a></p></div><!-- signature --> <?php
			
			// Generate additional footer links
			$footerlinks = array('viewcount', 'numberofwatchingusers', 'credits', 'lastmod' /*, 'privacy', 'about', 'disclaimer', 'tagline'*/ );
			$validFooterLinks = array();
			foreach( $footerlinks as $aLink ) {
				if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
					$validFooterLinks[] = $aLink;
				}
			}
			if ( count( $validFooterLinks ) > 0 ) {	?>
				<ul id="f-list"> 
					<li>Powered by <a href="http://www.mediawiki.org">MediaWiki</a>. &nbsp; </li>
					<?php
					foreach( $validFooterLinks as $aLink ) {
						if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {	?>
							<li id="<?php echo$aLink?>"><?php $this->html($aLink) ?> &nbsp; </li> <?php
						}
					} ?>
				</ul> <?php
			} 
			echo( $this->html('reporttime') );
			?>
			
			<p>&nbsp;</p>
			<p>&nbsp;</p>

			</div>	<!-- id:footer -->

		</div> <!-- id: bodyContent -->
	</div> <!-- id: content -->
	</div> <!-- id: column-content -->
	
	
	<!-- Site Actions =========================================================================== -->
	<div id="p-cactions" class="portlet">
		<!--h5><?php // $this->msg('views') ?></h5-->
		<div class="yah">
			<!--ul-->
	<?php		$fecounter = 0;
				foreach($this->data['content_actions'] as $key => $tab) {
					if($tab['text'] == 'Discussion') {
						// don't show discussion link to users that aren't logged in
						global $wgUser;
						if( $wgUser->isLoggedIn() == false ) { continue; }
					}
					if($fecounter>0) { echo '|&nbsp;'; }
					echo'<a href="'.htmlspecialchars($tab['href']).'"';
					# We don't want to give the watch tab an accesskey if the
					# page is being edited, because that conflicts with the
					# accesskey on the watch checkbox.  We also don't want to
					# give the edit tab an accesskey, because that's fairly su-
					# perfluous and conflicts with an accesskey (Ctrl-E) often
					# used for editing in Safari.
				 	if( in_array( $action, array( 'edit', 'submit' ) )
				 	&& in_array( $key, array( 'edit', 'watch', 'unwatch' ))) {
				 		echo $skin->tooltip( "ca-$key" );
				 	} else {
				 		echo $skin->tooltipAndAccesskey( "ca-$key" );
				 	}
				 	echo '>'.htmlspecialchars($tab['text']).'</a> <!--/li-->';
				 	$fecounter++;
				} ?>
				<?php // | <a href="javascript:toggleSidebar(true);">Presenter</a> ?>
				
			<!--/ul-->
		</div> <!-- id: pBody-->
	</div> <!-- id: portlet.p-cactions-->
</div> <!-- id: globalWrapper -->	
	
	
<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>

<?php $this->html('reporttime') ?>
<?php if ( $this->data['debug'] ): ?>

<!-- Debug output:
<?php $this->text( 'debug' ); ?>
-->

<?php endif; ?>


<!-- Scriptaculous Stuff to do after loading the page -->
<script type="text/javascript" language="javascript">// <![CDATA[
	// load Sidebar State (Presentation / Zoom level)
	loadSidebarState();
	// collapsable sidebar items
	addSidebarToggleEvents();
	// ]]>
</script>

<div id="extraHTMLBox"><?php // inject extra HTML per skin
	echo $extraHTML;
?></div>

</body></html>
