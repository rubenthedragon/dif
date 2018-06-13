<?php

require 'databaseconnectie.php';
if(isset($_POST['Register']))
	 { 
		$passwordRepeat = $_POST['HerhaalWachtwoord'];
		$username = $_POST['Gebruikersnaam'];
		$password = $_POST['Wachtwoord'];
        $hash = password_hash($password, PASSWORD_BCRYPT, array('cost'=>11));
	 	if($password == $passwordRepeat)
	 	{


		$sql = "INSERT INTO gebruiker (email, wachtwoord)
   					 VALUES (:Gebruikersnaam, :Wachtwoord)";

    	$query = $conn->prepare($sql);
    	$results = $query->execute(array(
    		":Gebruikersnaam" => $username,
    		":Wachtwoord" => $hash
    	));
    
    	if($results)
    	{

    		echo "Welkom: " ,$username;

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


