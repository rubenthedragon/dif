<?php

//Verwijzing naar het bestand om te connecten met de database
require 'databaseconnectie.php';
//als de Register button is ingedrukt
if(isset($_POST['Register']))
	 {  
        //variabelen
		$passwordRepeat = $_POST['HerhaalWachtwoord'];
		$username = $_POST['Gebruikersnaam'];
		$password = $_POST['Wachtwoord'];
        $name = $_POST['Naam'];

        //wachtwoord hash
        $hash = password_hash($password, PASSWORD_BCRYPT, array('cost'=>11));
        //als de wachtwoorden overeen komen
	 	if($password == $passwordRepeat)
	 	{

        //sql code
		$sql = "INSERT INTO gebruiker (email, naam, wachtwoord, type)
   					 VALUES (:Gebruikersnaam, :Naam, :Wachtwoord, 0)";

        //bereid de sql code voor
    	$query = $conn->prepare($sql);
        //voer de query uit als gebruikersnaam input is $username, wachtwoordinput als de hash en naaminput als $name
    	$results = $query->execute(array(
    		":Gebruikersnaam" => $username,
			":Wachtwoord" => $hash,
            ":Naam" => $name


		
    	));
        
        //als de query uitgevoerd wordt 
    	if($results)
    	{

    		header('Location: login.html');

    	}
    	else {
    		echo "Gebruikersnaam is al in gebruik";
    	}
} else
{
	echo "wachtwoord komt niet overeen";
}


}
 ?>


