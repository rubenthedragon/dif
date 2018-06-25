<?php 
require 'adminPage.php';
require 'databaseconnectie.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("SELECT * FROM reservering");
$verw=$_REQUEST["verw"];
if (isset($_REQUEST["Delete"])) {
	if ($verw=="") {
		echo "Niks aangeklikt";
	}else{
	$a = implode(",", $verw);
	echo "$a";
	$conn->exec("DELETE FROM reservering WHERE nummer, gebruiker, datum, tijd IN ($a)");
	//header('Location: adminPage.php');
}
}



 ?>