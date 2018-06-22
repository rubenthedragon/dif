
<?php
session_start();

try {
//Verwijzing naar het bestand om te connecten met de database
require 'databaseconnectie.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo 'ERROR: ' . $e->getMessage();
}
//Als alle velden zijn ingevuld
if (isset($_POST['submit'])) {

if(isset($_POST['email'])) {

if(isset($_POST['password'])) {

//variabelen
$username = $_POST['email'];
$password = $_POST['password'];
$_SESSION["username"] = $username;



//connectie, bereid sql query voor
$query = $conn->prepare("SELECT * FROM `gebruiker` WHERE `email` = :email");
//voer query uit waar emailiput is $username
$query->execute(array('email' => $username));

//vraag gegevens op
$data = $query->fetch();

//met hash BCRYPT, checkt of wachtwoord overeenkomt met de gegevens uit de database
if(password_verify($password, $data['wachtwoord'])){
	if ($data['type']==1) {
	//ga naar pagina plattegrondv3Admin
		header("Location: plattegrondv3Admin.php?username=$username");
	} else {
		//ga naar pagina plattegrondv3
		header("Location: plattegrondv3.php?username=$username");
	}
	
} else {
//geeft weer dat de gebruikersnaam onjuist is of de wachtwoord combinatie verkeerd is
echo "Gebruikersnaam is onjuist/wachtwoord combinatie is verkeerd";
}
} else {
//geeft weer dat het wachtwoord niet leeg mag zijn(verplicht is)
echo "Wachtwoord mag niet leeg zijn";
}

} else {
//geeft weer dat de gebruikersnaam niet leeg mag zijn(verplicht is)
echo "Gebruikersnaam mag niet leeg zijn";
}

}

?>

