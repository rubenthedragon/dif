<?php 

try {
//verwijzing naar databse document
require 'databaseconnectie.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo 'ERROR: ' . $e->getMessage();
}
if(isset($_POST['submit']))
{	
	//variabelen
	$username = $_POST['email'];
	$username = filter_var($username, FILTER_SANITIZE_STRING);
	$query = $conn->prepare("SELECT COUNT('id') FROM `gebruiker` WHERE `email` = :email");
	$query->execute(array('email' => $username));
	$count = $query->fetchColumn();

	//als count 1 is, is de email geregistreerd
	if ($count == "1"){
	header('Location: login.php'); // LOGIN SCRIPT  ,,, ga naar ... 
	} else {
	echo "Gebruikersnaam is niet bekend bij ons";
}
}

 ?>