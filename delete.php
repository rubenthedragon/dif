<?php 
require 'databaseconnectie.php';

/*Als op de knop delete wordt gedrukt en er is een checkbox aan gevinkt,
dan wordt door gebruikt van een for loop die gegevens uit een array (die gemaakt is met de text values van het reservings tabel)
vergeleken met de gevens van de database. Als de gegevens overeenkomen worden de gevens uit de database verwijdert en wordt de gebruiker geredirect naar adminPage.php*/
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

/*Als op de knop update wordt gedrukt en er is een checkbox aan gevinkt,
dan worden gegevens van de datepicker, de dropdown options van de rijen waar de checkbox was afgevinkt en de aantal rijen van het tabel opgehaald. 
Het aantal rijen werd gebruikt om de juiste dropdown option en datepicker van de jusite rij op te halen. 
Als de gegevens overeenkomen worden de gevens uit de database aangepast en wordt de gebruiker geredirect naar adminPage.php*/

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
			$queryUp = $conn->prepare("UPDATE reservering SET nummer = '$selectNummer[$row]', datum = '$selectDatum[$row]', tijd = '$selectTijd[$row]' WHERE nummer = :nummer AND datum = :datum AND tijd = :tijd");
			$queryUp->execute([
				'nummer' => $b[0],
				'datum' => $b[1],
				'tijd' => $b[2]
			]);
		}
	}
	header("Location: ./adminPage.php");
}

 ?>