<?php 
require 'databaseconnectie.php';

if (isset($_REQUEST["Delete"]))
{
	$verw=$_REQUEST["verw"];
	if ($verw=="")
	{
		echo "Niks aangeklikt";
	}
	else
	{
		for($i = 0; $i < count($verw); $i++)
		{
			$a = explode(",", $verw[$i]);
			$queryDel = $conn->prepare("DELETE FROM reservering WHERE nummer = :nummer AND datum = :datum AND tijd = :tijd");
			$queryDel->execute([
				'nummer' => $a[0],
				'datum' => $a[1],
				'tijd' => $a[2]
			]);
		}
	}
	header("Location: ./adminPage.php");
}



if (isset($_REQUEST["Update"]))
{
	$upd=$_REQUEST["upd"];
	if ($upd=="")
	{
		echo "Niks aangeklikt";
	}
	else
	{
		for($i = 0; $i < count($upd); $i++)
		{
			$selectNummer = $_REQUEST['roomSel'];
			$selectDatum = $_REQUEST['datumSel'];
			$selectTijd = $_REQUEST['tijdSel'];
			$b = explode(",", $upd[$i]);
			$row = $b[3];
			$queryDel = $conn->prepare("UPDATE reservering SET nummer = '$selectNummer[$row]', datum = '$selectDatum[$row]', tijd = '$selectTijd[$row]' WHERE nummer = :nummer AND datum = :datum AND tijd = :tijd");
			$queryDel->execute([
				'nummer' => $b[0],
				'datum' => $b[1],
				'tijd' => $b[2]
			]);
		}
	}
	header("Location: ./adminPage.php");
}

 ?>