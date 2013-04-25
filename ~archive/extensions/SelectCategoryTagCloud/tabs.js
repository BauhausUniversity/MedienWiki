	//Change color of the tabs
	function ChangeColor(buttonUp,buttonDown){ 
		
		//Display one tab as being selected
		buttonUp = document.getElementById(buttonUp) 
		buttonUp.className = "buttonhighlight"
		
		//Deselect other tab
		buttonDown = document.getElementById(buttonDown) 				
		buttonDown.className = "buttonunhighlight"
	} 
	
	//Show and hide the divs
	function showhide(show,hide){
		
		//Set one div to be visible
		show = document.getElementById(show)
		show.style.visibility= 'visible'
		
		//Hide  other div
		hide = document.getElementById(hide)
		hide.style.visibility = 'hidden'
		
		//Align the two divs
		arrPos1 = findPos(show)
		arrPos2 = findPos(hide)
		//Find the difference of Top between the two
		intNewY = arrPos1[1] - arrPos2[1];
		//Add difference to second div if it is lower than the first one
		if(intNewY > 0){
			show.style.bottom = intNewY + 'px'
		}
	}
	
	function findPos(obj) {
		var curleft = curtop = 0;
		if (obj.offsetParent) {
			curleft = obj.offsetLeft
			curtop = obj.offsetTop
			while (obj = obj.offsetParent) {
				curleft += obj.offsetLeft
				curtop += obj.offsetTop
			}
		}
		return [curleft,curtop];
	}