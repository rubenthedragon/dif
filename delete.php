<?php 
require 'adminPage.php';

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$verw=$_REQUEST["verw"];
if (isset($_REQUEST["Delete"])) {
	if ($verw=="") {
		echo "Niks aangeklikt";
	}else{
	$a = implode(",", $verw);
	echo "$a";
	$conn->exec("SELECT * FROM reservering");
	$conn->exec("DELETE FROM reservering WHERE nummer, gebruiker, datum, tijd IN ($a)");
	//header('Location: adminPage.php');
	
}
}



 ?>