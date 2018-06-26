<?php 
require 'adminPage.php';
require 'databaseconnectie.php';
$verw=$_REQUEST["verw"];
if (isset($_REQUEST["Delete"])) {
	if ($verw=="") {
		echo "Niks aangeklikt";
	}
	else{
	
	for($i = 0; $i < count($verw); $i++)
	{
		echo count($verw);
	$a = explode(",", $verw[$i]);


	$queryDel = $conn->prepare("DELETE FROM reservering WHERE nummer = :nummer AND datum = :datum AND tijd = :tijd");
	$queryDel->execute([
		'nummer' => $a[0],
		'datum' => $a[1],
		'tijd' => $a[2]
	]);

	header("Location: adminPage.php");
	
	}
}


 ?>