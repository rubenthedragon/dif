function myFunction() {
	//variabele
    var x = document.getElementById("wachtwoordInput");

    //als tpe wachtwoord is verander het type naar tekst en andersom voor Wachtwoord
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    //als tpe wachtwoord is verander het type naar tekst en andersom voor HerhaalWachtwoord
     var y = document.getElementById("HerhaalWachtwoordInput");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }

   
}



function checkPass()
{
    //Variabelen
    var pass1 = document.getElementById('wachtwoordInput');
    var pass2 = document.getElementById('HerhaalWachtwoordInput');
    var message = document.getElementById('confirmMessage');
    //kleurcodes
    var groen = "#66cc66";
    var rood = "#ff6666";
    //als de wachtwoorden overeenomen
    if(pass1.value == pass2.value){ 
        //zet de achtergrond kleur naar groen en message de gebruiker 
        pass2.style.backgroundColor = groen;
        message.style.color = groen;
        message.innerHTML = "Wachtwoord komt overeen!"
    }else{
    	//wachtwoorden komen niet overeen
        //zet de achtergrond kleur naar rood en message de gebruiker 
        pass2.style.backgroundColor = rood;
        message.style.color = rood;
        message.innerHTML = "Wachtwoord komt niet overeen!"
    }
}  

