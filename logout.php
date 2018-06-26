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

if(isset($_GET['id']))
{
    session_id($_GET['id']);
    session_start();
    session_unset();
    session_destroy();
}
?>