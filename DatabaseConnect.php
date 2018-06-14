<?php

require 'databaseconnectie.php';
if(isset($_POST['Register']))
	 { 
		$passwordRepeat = $_POST['HerhaalWachtwoord'];
		$username = $_POST['Gebruikersnaam'];
		$password = $_POST['Wachtwoord'];
        $name = $_POST['Naam'];
        $hash = password_hash($password, PASSWORD_BCRYPT, array('cost'=>11));
	 	if($password == $passwordRepeat)
	 	{


		$sql = "INSERT INTO gebruiker (email, naam, wachtwoord)
   					 VALUES (:Gebruikersnaam, :Naam, :Wachtwoord)";

    	$query = $conn->prepare($sql);
    	$results = $query->execute(array(
    		":Gebruikersnaam" => $username,
			":Wachtwoord" => $hash,
            ":Naam" => $name
		
    	));
    
    	if($results)
    	{

    		echo "Welkom: " ,$name;

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


