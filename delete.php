<?php 
require 'adminPage.php';
require 'databaseconnectie.php';
$verw=$_REQUEST["verw"];
if (isset($_REQUEST["Delete"])) {
	if ($verw=="") {
		echo "Niks aangeklikt";
	}else{
	
}
	$a = explode(",", $verw[0]);
	echo $a[0];
	$queryDel = $conn->prepare("DELETE FROM reservering WHERE nummer = :nummer AND datum = :datum AND tijd = :tijd");
	$queryDel->execute([
		'nummer' => $a[0],
		'datum' => $a[1],
		'tijd' => $a[2]
	]);
	header("Location: adminPage.php");
	
	}




 ?>