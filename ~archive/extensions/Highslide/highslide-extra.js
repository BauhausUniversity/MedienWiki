
		
		hs.align = 'center';
		hs.transitions = ['expand', 'crossfade'];
		hs.fadeInOut = true;
		hs.dimmingOpacity = 0.8;
		hs.outlineType = 'rounded-white';
		//hs.captionEval = 'this.thumb.alt';
		// This value needs to be set to false, to solve the issue with the highly increasing view counts.
		hs.continuePreloading = false;
		hs.showCredits = false;
		hs.numberPosition= 'caption';
		hs.headingEval = 'this.a.title';
		hs.captionEval = 'this.thumb.alt'

		// Add the slideshow providing the controlbar and the thumbstrip
		hs.addSlideshow({
			interval: 2000,
			repeat: true,
			useControls: true,
	fixedControls: false,
	overlayOptions: {
		className: 'controls-in-heading',
		opacity: '0.75',
		position: 'bottom right',
		offsetX: '0',
		offsetY: '22',
		hideOnMouseOut: false
	},
	thumbstrip: {
		mode: 'horizontal',
		position: 'bottom center',
		relativeTo: 'viewport',
		offsetY: '-10'
	}
		});

