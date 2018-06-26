<?php
try 
{
	//Verwijzing naar het bestand om te connecten met de database
	require 'databaseconnectie.php';
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
	echo 'ERROR: ' . $e->getMessage();
}

//Als alle velden zijn ingevuld
if (isset($_POST['submit'])) 
{
	if(isset($_POST['email'])) 
	{
		if(isset($_POST['password'])) 
		{
			session_start();
			//variabelen
			$username = $_POST['email'];
			$password = $_POST['password'];
			$_SESSION['username'] = $username;

			//connectie, bereid sql query voor
			$query = $conn->prepare("SELECT * FROM `gebruiker` WHERE `email` = :email");
			//voer query uit waar emailiput is $username
			$query->execute(array('email' => $username));

			//vraag gegevens op
			$data = $query->fetch();

			//met hash BCRYPT, checkt of wachtwoord overeenkomt met de gegevens uit de database
			if(password_verify($password, $data['wachtwoord']))
			{
				if ($data['type']==1) 
				{
					//ga naar pagina plattegrondv3Admin
					header("Location: plattegrondv3Admin.php");
				} 
				else 
				{
					//ga naar pagina plattegrondv3
					$sessionid = session_id();
					header("Location: plattegrondv3.php?id=$sessionid");
				}
			}
		} 
	}	
}	
else 
{
	//geeft weer dat het wachtwoord niet leeg mag zijn(verplicht is)
	echo "Probeer opnieuw";
}
?>

