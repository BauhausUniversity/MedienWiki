// ***** Change Font Sizes *****
// note font-sizes are currently not used due to the very nice scriptaculous scaling effect //
//  

/* 
	<ul>
		<li class="level3"><br/><br/>
			<script language="JavaScript"><!-- 
				// load current fontSize from cookie
				loadFontSize();	//-->
			</script>
			<span style="font-size:85%"><a href="javascript:decreaseFontSize();">Font --</a></span> | <a href="javascript:resetFontSize();">100%</a> | <span stlye="font-size:120%"><a href="javascript:increaseFontSize();">Font ++</a></span>
		</li>
		<li class="level3">
			<a href="javascript:hideSidebar();">Hide Sidbar</a>
		</li>
	</ul>
			
*/


function changeFontSize(increase) {
	// get current size
	var currentFontSize = readCookie('currentfontsize');
	currentFontSize = parseInt(currentFontSize);
	if(isNaN(currentFontSize)) { currentFontSize = 100; }
	if( currentFontSize <  50) { currentFontSize =  50; }
	if( currentFontSize > 600) { currentFontSize = 600; }
	// increase fontSize of div#bodyContent
	var element = document.getElementById('bodyContent');
	var size;
	switch(increase) {
		case -1:
			// just load (called from body onload)
			size = currentFontSize;
			break;
		case 0:
			size = currentFontSize - 10;
			break;
		case 1:
			size = currentFontSize + 10;
			break;
		case 100:
		default:
			size = 100;
			break;
	}
	element.style.fontSize = size + "%";
	element.style.lineHeight = (size + (size / 2)) + "%";
	// save current size back to cookie
	document.cookie = "currentfontsize=" + size;
}
function increaseFontSize() {
	changeFontSize(1);
}
function decreaseFontSize() {
	changeFontSize(0);
}
function resetFontSize() {
	changeFontSize(100);
}
function loadFontSize() {
	changeFontSize(-1);
}
