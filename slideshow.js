
	var i = 0; // Start point
	var afbeelding = [];
	var tijd = 2000;

	// Image List
	afbeelding[0] = 'logo.jpg';
	afbeelding[1] = 'logo02.jpg';
	afbeelding[2] = 'logo3.jpg';
	afbeelding[3] = 'logo4.jpg';
	afbeelding[4] = 'logo5.jpg';


	// Change Image
	function veranderAfb(){
		document.slide.src = afbeelding[i];

		if(i < afbeelding.length - 1){
			i++;
		} else {
			i = 0;
		}

		setTimeout("veranderAfb()", tijd);
	}

	window.onload = veranderAfb;

