
	var i = 0; //begin afbeelding
	var afbeelding = []; //afbeelding array
	var tijd = 2000; //aantal miliseconden per afbeelding

	//Afbeeldingen
	afbeelding[0] = 'logo.jpg';
	afbeelding[1] = 'logo02.jpg';
	afbeelding[2] = 'logo3.jpg';
	afbeelding[3] = 'logo4.jpg';
	afbeelding[4] = 'logo5.jpg';


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

