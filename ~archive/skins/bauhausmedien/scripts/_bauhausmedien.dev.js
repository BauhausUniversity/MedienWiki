/*
 * Various scripts for bauhausmedien template
 *
 * Based on Code
 * from MediaWiki & Scriptaculous
 * 
 * (cc) 2009 Michael Markert
 * Bauhaus-University Weimar
 * 
 */
 

// ***** COOKIE Functions ***** //

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}


// ***** TOC Functions ***** //
var tocTable;	// tocTable Draggable instance


function bauhausShowTocToggle() {
	if (document.createTextNode) {
		// Uses DOM calls to avoid document.write + XHTML issues

		var linkHolder = document.getElementById('toctitle');
		if (!linkHolder) {
			return;
		}

		var outerSpan = document.createElement('span');
		outerSpan.id = 'tocspan';
		outerSpan.className = 'toctoggle';

		var toggleLink = document.createElement('a');
		toggleLink.id = 'togglelink';
		toggleLink.className = 'internal';
		toggleLink.href = 'javascript:bauhausToggleToc()';
		
		var toggleImage = document.createElement('img');
		toggleImage.id = 'toggleimage';
		toggleImage.src = tocHideIcon;
		toggleLink.appendChild(toggleImage);

		//toggleLink.appendChild(document.createTextNode(tocHideText));
		//outerSpan.appendChild(document.createTextNode('['));
		outerSpan.appendChild(toggleLink);
		//outerSpan.appendChild(document.createTextNode(']'));

		linkHolder.appendChild(document.createTextNode(' '));
		linkHolder.appendChild(outerSpan);

		makeDraggableToc(outerSpan);
		
		var cookiePos = document.cookie.indexOf("hidetoc=");
		if (cookiePos > -1 && document.cookie.charAt(cookiePos + 8) == 1) {
			bauhausToggleToc(true);
		}
	}
}

function bauhausToggleToc(toggleImmediately, show) {
	// if show is set to true, it will show!
	var toc = document.getElementById('toc');
	if(!toc) { return; }	// don't continue if there is no toc
	var tocContent  = toc.getElementsByTagName('ul')[0];
	var toggleLink  = document.getElementById('togglelink');
	var toggleImage = document.getElementById('toggleimage');

	//if(tocContent && toggleLink && tocContent.style.display == 'none') {
	if( show || (tocContent && tocContent.style.display == 'none') ) {
		// == show ==
		if(toggleImmediately) {
			tocContent.style.display = 'visible';
		} else {
			//Effect.toggle(tocContent, 'blind', { to: 0.6, duration: 0.5 } );
			// todo/fix: there should be a way to determine and setting the height before sliding
			tocContent.slideDown("fast"); 
		}
		//changeText(toggleLink, tocHideText);
		toggleImage.src = tocHideIcon;
		
		// save current state
		document.cookie = "hidetoc=0";
		
	} else {
		// == hide ==
		if(toggleImmediately) {
			tocContent.style.display = 'none';
		} else {
			//Effect.toggle(tocContent, 'blind', { duration: 0.5 } );
			tocContent.slideUp("fast");
		}
		//changeText(toggleLink, tocShowText);
		toggleImage.src = tocShowIcon;
		
		// save current state
		document.cookie = "hidetoc=1";
		
	}
}

/*
function bauhausToggleToc(toggleImmediately) {
	bauhausToggleToc(toggleImmediately, false);
}
*/

function showToc() { bauhausToggleToc(false, true); }
function hideToc() { bauhausToggleToc(false, false); }



// ***** DRAGGABLE TOC Functions *****//

function makeDraggableToc(tocSpan) {
	
	// create reset element
	var tocReset = document.createElement('a');
	tocReset.id = 'tocreset';
	tocReset.href = "javascript:resetDraggableToc()";
	var tocResetImg = document.createElement('img');
	tocResetImg.id = 'tocresetimg';
	tocReset.appendChild(tocResetImg);
	
	// append resetItem to tocSpan
	tocSpan.appendChild(tocReset);
	
	// make draggable instance
	var toc = document.getElementById('toc');
	tocTable = new Draggable('toc', { 
		revert: false,	// don't snap back
		starteffect: function() { 
			new Effect.Opacity('toc', {from:0.95, to:0.60, duration:0.4}); 
			// add remove drag option
			tocResetImg.src = tocResetIcon;
		},
		endeffect: function() { 
			new Effect.Opacity('toc', {from:0.60, to:0.80, duration:0.4});
			// save position
			document.cookie = "tocposx=" + toc.style.left;
			document.cookie = "tocposy=" + toc.style.top;
		}
	});
	
	// set to initial position
	var cookie = document.cookie;
	var cookiePos = cookie.indexOf("tocposx=");
	if (cookiePos > -1 && cookie.charAt(cookiePos + 8) > 0) {
		toc.style.left = readCookie("tocposx");
		toc.style.top  = readCookie("tocposy");
		// show reset icon
		tocResetImg.src = tocResetIcon;
	}
}


function resetDraggableToc() {
	// clear position values in cookie
	document.cookie = "tocposx=0";
	document.cookie = "tocposy=0";
	// reload page
	if(document.getElementById('editform')) {
		alert("The Table of Contents position has been reset. It will update once you reload the page.");
	} else {
		window.location.reload();
	}
}



// ***** SIDEBAR ITEMS *****
function addSidebarToggleEvents() {
	// this is a crazy js... because MediaWiki doesn't wrap its code properly! Argh!
	// and instead of providing a clean templating system, where one could override the visual output
	// to correct this kind of stuff, the ul-li-div parsers are hidden in the depths of mw.
	
	// get all sidebar divs (starting with 'p-')
	var divs = document.getElementsByTagName('div');
	var sidebarDivs = new Array();
	var i,j;
	for(i=0; i<divs.length; i++) {
		if(divs[i].id.indexOf("p-") == 0) {
			// found sidebar item (starting with p-...)
			sidebarDivs.push(divs[i]);
		}
	}
	// get all sidebar ul's
	var sidebarTopLevelItems = document.getElementsByTagName('li');
	for(i=0; i<sidebarTopLevelItems.length; i++) {
		var item = sidebarTopLevelItems[i];
		if(item.className == "level1") {
			// create span for level 1 title
			var spanItem = document.createElement("span");
			var innerText = item.textContent.split('\n', 2)[0];
			spanItem.textContent = innerText;
			// extract div for level 2... contents
			var divItem = item.getElementsByTagName('div')[0];				
			// remove current innerHTML
			item.innerHTML = "";
			// set new contents
			item.appendChild(spanItem);
			item.appendChild(divItem);
			// add event listener to span element
			spanItem.addEventListener('click', toggleSidebarItem, false);
			// read cookie and set state if hidden
			var show = readCookie(item.parentNode.parentNode.id);
			if(show == false) {
				divItem.style.display = 'none';
			}
		}
	}
}

function toggleSidebarItem(toggleImmediately) {
	// get item that sent the request (how?)
	// toggle contained <div class='pBody'></div>
	var levelDiv = this.parentNode.getElementsByTagName("div")[0];
	// toggle
	var sidebarItemState = 0;
	if(levelDiv.style.display == 'none') {
		sidebarItemState = 1;
		Effect.toggle(levelDiv, 'blind', { to: 0.85, duration: 0.5 } );
		// jQ (?): levelDiv.show("blind", { direction: "horizontal" }, 800);
	} else {
		sidebarItemState = 0;
		Effect.toggle(levelDiv, 'blind', { duration: 0.5 } );
		// jQ (?): levelDiv.hide("blind", { direction: "horizontal" }, 800);
	}
	var sidebarItemCookieValue = ""+this.parentNode.parentNode.parentNode.id+"="+sidebarItemState;
	document.cookie = sidebarItemCookieValue;
}




// ***** HIDE MENU *****
var sidebartoleft = -286;
var sidebartoright = 286;
var scaleupcontent = 140;
var scaledowncontent = 72;

function hideSidebar(zoom) {
	var globalnav = document.getElementById('globalnav');
	new Effect.Move( globalnav, {
		x:sidebartoleft,
		y:0,
		mode: 'relative',
		transition: Effect.Transitions.sinoidal
	});
	var content = new Array();
	content[0] = document.getElementById('content');
	content[1] = document.getElementById('mglogos');
	for(var i=0;i<content.length;i++) {
		new Effect.Move( content[i], {
			x:sidebartoleft,
			y:0,
			mode: 'relative',
			transition: Effect.Transitions.sinoidal
		});
		if(zoom) {
			new Effect.Scale( content[i], scaleupcontent, {
				scaleX: 0,
				scaleY: scaleupcontent
			});
		}
	}
	document.cookie = "presentationmode=1";
}
function showSidebar(zoom) {
	var globalnav = document.getElementById('globalnav');
	new Effect.Move( globalnav, {
		x:sidebartoright,
		y:0,
		mode: 'relative',
		transition: Effect.Transitions.sinoidal
	});
	var content = new Array();
	content[0] = document.getElementById('content');
	content[1] = document.getElementById('mglogos');
	for(var i=0;i<content.length;i++) {
		new Effect.Move( content[i], {
			x:sidebartoright,
			y:0,
			mode: 'relative',
			transition: Effect.Transitions.sinoidal
		});
		if(zoom) {
			new Effect.Scale( content[i], scaledowncontent, {
				scaleX: 0,
				scaleY: scaledowncontent
			});
		}
	}
	document.cookie = "presentationmode=0";
}
function loadSidebarState() {
	// this is called after HTML has been loaded; check for sidebar state
	var presentationmode = readCookie("presentationmode");
	var globalnav = document.getElementById('globalnav');
	if(presentationmode==1) {
		hideSidebar();
		//hideToc();
	}
}
function toggleSidebar(zoom) {
	var presentationmode = readCookie("presentationmode");
	var globalnav = document.getElementById('globalnav');
	if(presentationmode==1) {
		// switch to normal mode
		if(zoom) {
			showSidebar(zoom);
			showToc();
		} else {
			showSidebar();
		}
	} else {
		// activate presentation mode
		if(zoom) {
			hideSidebar(zoom);
			hideToc();
		} else {
			hideSidebar();
		}
	}	
}

