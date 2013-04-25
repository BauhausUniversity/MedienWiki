<?php
/**
 * @author Jean-Lou Dupont
 * @package SidebarEx
 * @version $Id: SidebarEx.body.php 1185 2008-06-17 20:08:20Z jeanlou.dupont $
 */
//<source lang=php>
class SidebarEx
{
	// constants.
	const thisName = 'SidebarEx';
	const thisType = 'other';  // must use this type in order to display useful info in Special:Version
	const id       = '$Id: SidebarEx.body.php 1185 2008-06-17 20:08:20Z jeanlou.dupont $';

	// Integration with PageSidebar extension
	const DISABLE_PAGESIDEBAR_CMD =' @@disable_pagesidebar@@';
	
	// default values
	static $baseNs   = NS_MEDIAWIKI;  	// default namespace
	static $basePage = 'Sidebar';     	// default base page
	static $baseSearch   = array(	'sysop',
									'user',
									'*' );

	// variables.
	var $foundPage;
	var $Ns;
	var $Page;
	var $Search;

	function __construct()
	{
		$this->foundPage = false;
		
		// customization found?
		global $bwSidebarNs, $bwSidebarPage, $bwSidebarSearch;
		$this->Ns     = isset($bwSidebarNs)    ==true ? $bwSidebarNs:     self::$baseNs;
		$this->Page   = isset($bwSidebarPage)  ==true ? $bwSidebarPage:   self::$basePage;
		$this->Search = isset($bwSidebarSearch)==true ? $bwSidebarSearch: self::$baseSearch;				
		
	}
	public function hSkinTemplateOutputPageBeforeExec( &$skin, &$tpl )
	{
		$pbar = array();
		$foundPageSidebarDisableCommand = false;
		
		$gbar = $this->doGroupSidebar();
		$ubar = $this->doUserSidebar();
		$nbar = $this->doNsSidebar( $foundPageSidebarDisableCommand );
		
		if ( !$foundPageSidebarDisableCommand )
			$pbar = $this->doPageSidebar();		
		
		// get current sidebar text
		#$cbar = $tpl->data['sidebar'];

		// add our own here
		$tpl->set( 'sidebar', array_merge(/*$cbar,*/ $gbar, $nbar, $ubar, $pbar ) );		
		
		return true;
	}
	/**
		Fetches the per-namespace sidebar according to 'MediaWiki:Sidebar/Ns/$ns'
	 */
	private function doNsSidebar( &$pagesidebar_disable_cmd )
	{
		global $wgTitle;
		
		// paranoia.
		if (!($wgTitle instanceof Title))
			return array();
			
		$ns = $wgTitle->getNamespace();
		
		// fix for 'limitation' of stock MediaWiki
		// where NS_MAIN is not defined.
		if ( 0 !== $ns )
			$nsname = Namespace::getCanonicalName( $ns );
		else
			$nsname = 'Main';

		$title = Title::makeTitle( $this->Ns, $this->Page.'/Ns/'.$nsname );
		$a     = new Article( $title );
		
		if (($a===null) || ($a->getID()===0))		
			return array();
			
		$text = $a->getContent();
		
		// extract disable command
		$pagesidebar_disable_cmd = $this->cmdDisablePresent( $text );
		
		$bar  = $this->processSidebarText( $text );

		return $bar;		
	}
	/**
		Fetches the per-user sidebar according to 'User:username/Sidebar'
	 */
	private function doUserSidebar()
	{
		global $wgUser;
		
		$userName = $wgUser->getName();

		$title = Title::makeTitle( NS_USER, $userName.'/Sidebar' );
		$a     = new Article( $title );
		
		// does 'username/Sidebar' page exist?
		if (($a===null) || ($a->getID()===0))		
			return array();
			
		$text = $a->getContent();
		$bar  = $this->processSidebarText( $text );

		return $bar;		
	}
	private function doGroupSidebar()
	{
		global $wgUser;
		
		// get group membership array
		// even default group '*' is included as well as 'user' is logged in.
		$gr = $wgUser->getEffectiveGroups();
		
		// order the list based on the search order provided
		// Search array:  { 0->highest/first, 1-> ... }
		//
		// The group membership array provided by MW is assumed not to be sorted;
		// let's walk the search array to find a matching group.
		$page = null;
		foreach( $this->Search as $index => $group)
			if (in_array( $group, $gr )) { $page = $group; break; }
			 
		// did we find satisfaction?
		if (empty( $page )) 
			return array();
		
		// form the path to the article:
		// Namespace:base page/group name
		$title = Title::makeTitle( $this->Ns, $this->Page.'/'.$page );
		$a     = new Article( $title );		
		
		// is the corresponding page found?
		if (($a===null) || ($a->getID()===0))
			return array();
		
		$text = $a->getContent();
		$bar  = $this->processSidebarText( $text );

		return $bar;		
	}
	private function processSidebarText( &$textSideBar )
	// copied from SkinTemplate MW 1.8.x SVN
	{
		$bar = array();
		$lines = explode( "\n", $textSideBar );
		foreach ($lines as $line) {
			if (strpos($line, '*') !== 0)
				continue;
			if (strpos($line, '**') !== 0) {
				$line = trim($line, '* ');
				$heading = $line;
			} else {
				if (strpos($line, '|') !== false) { // sanity check
					$line = explode( '|' , trim($line, '* '), 2 );
					$link = wfMsgForContent( $line[0] );
					if ($link == '-')
						continue;
					if (wfEmptyMsg($line[1], $text = wfMsg($line[1])))
						$text = $line[1];
					if (wfEmptyMsg($line[0], $link))
						$link = $line[0];
					$href = self::makeInternalOrExternalUrl( $link );
					$bar[$heading][] = array(
						'text' => $text,
						'href' => $href,
						'id' => 'n-' . strtr($line[1], ' ', '-'),
						'active' => false
					);
				} else { continue; }
			}
		}
		return $bar;	
	}
	static function makeInternalOrExternalUrl( $name )
	// copied from SkinTemplate MW 1.8.x SVN	 
	{
		if ( preg_match( '/^(?:' . wfUrlProtocols() . ')/', $name ) ) {
			return $name;
		} else {
			return self::makeUrl( $name );
		}
	}

	static function makeUrl( $name, $urlaction = '' )
	// copied from SkinTemplate MW 1.8.x SVN 
	{
		$title = Title::newFromText( $name );
		self::checkTitle( $title, $name );
		return $title->getLocalURL( $urlaction );
	}

	static function checkTitle( &$title, &$name )
	// copied from SkinTemplate MW 1.8.x SVN 
	{
		if( !is_object( $title ) ) {
			$title = Title::newFromText( $name );
			if( !is_object( $title ) ) {
				$title = Title::newFromText( '--error: link target missing--' );
			}
		}
	}

	/*==========================================================================
	 * INTEGRATION with PageSidebar extension
	 ==========================================================================*/
	
	/**
	 * Verifies if the 'disable pagesidebar' command is present
	 * in the $content text provided
	 */
	protected function cmdDisablePresent( &$content ) {
		
		if ( stripos( $content, self::DISABLE_PAGESIDEBAR_CMD ) === false )
			return false;
			
		$content = str_replace( self::DISABLE_PAGESIDEBAR_CMD, '', $content );
		
		return true;
	}
	/**
	 * Handles the retrieval of the 'page level' sidebar
	 *  Requires a participating extension such as [[Extension:PageSidebar]]
	 */
	protected function doPageSidebar() {
		
		$contents = false;
		wfRunHooks( 'PageSidebar', array( &$contents ) );
		
		// PageSidebar extension either:
		//  1- not present
		//  2- not recent enough i.e. does not support 'PageSidebar' hook
		if ( !is_array( $contents ) ) {
			return array();
		}
		
		return ( $contents );
	}
	
} // END CLASS DEFINITION
// </source>