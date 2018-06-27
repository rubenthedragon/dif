	var i = 0; //begin afbeelding
	var afbeelding = []; //afbeelding array
	var tijd = 2000; //aantal miliseconden per afbeelding

	//Afbeeldingen
	afbeelding[0] = 'resources/logo.jpg';
	afbeelding[1] = 'resources/logo2.jpg';
	afbeelding[2] = 'resources/logo3.jpg';
	afbeelding[3] = 'resources/logo4.jpg';
	afbeelding[4] = 'resources/logo5.jpg';


	//Verander de afbeelding
	function veranderAfb(){
		document.slide.src = afbeelding[i];

		if(i < afbeelding.length - 1){
			i++;
		} else {
			i = 0;
		}

		setTimeout("veranderAfb()", tijd);
	}
	//als scherm geladen is begin gelijk met de slideshow
	window.onload = veranderAfb;
