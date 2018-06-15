<!DOCTYPE html>
<html>
<head>
	<!--Verwijst naar het Style document(css)-->
	<link rel="stylesheet" type="text/css" href="Style.css">
	<!--Verwijst naar het ShowWachtwoord document(js)-->
	<script src="ShowWachtwoord.js"></script>
	<!--titel-->	
	<title>Registreer</title>
</head>
<body>
	<div id="container">
		<div id="afbeeldingDIF"></div>
		<div id="registratieform">
			<div id="RegistrerenText">Registreren</div>
			<div id="MeldjenuaanText">Meld je nu aan</div> 
			<div id="register">
				<!--form methode, actie, verwijzing naar de databaseconnectie pagina-->
				<form method="post" action="DatabaseConnect.php">
					<table id= "table1">
						<tr>
							<td><B>Naam:</B></td>
							<!--Maak text box aan met tijdelijke invulling, de tekst invullen is verplicht-->
							<td><input type="text" placeholder="Naam*" name="Naam" id="naam" required></td>
						</tr>
						<tr>
							<td><B>Email:</B></td>
							<!--Maak text box aan met tijdelijke invulling, de tekst invullen is verplicht-->
							<td><input type="text" placeholder="Email*" name="Gebruikersnaam" id="GebruikersNaam" required></td>
						</tr>
						<tr>
							<td><B>Wachtwoord:</B></td>
							<!--Maak wachtwoord box aan met tijdelijke invulling, invullen is verplicht-->
							<td><input type="password" placeholder="Wachtwoord*" name="Wachtwoord" id="wachtwoordInput" required></td>
						</tr>
						<tr>
							<td><B>Herhaal wachtwoord:</B></td>
							<!--Maak wachtwoord box aan met tijdelijke invulling, invullen is verplicht, als er niet meer getypt wordt verwijs naar functie checkpass -->
							<td><input type="password" placeholder="Herhaal wachtwoord*" name="HerhaalWachtwoord", id="HerhaalWachtwoordInput" onkeyup="checkPass(); return false;"required></td>
							<span id="confirmMessage" class="confirmMessage"></span>	
						</tr>
						<tr>
							<!--maak button Registreer aan-->
							<td><input type="submit" value="Registreer" name="Register"  ></td>
							<td>Wachtwoord zichtbaar:<input type="checkbox" onclick="myFunction()"></td>
						</tr>
						<tr>
							<td><B>Al een account?</B>  </td>
							<!--verwijzing naar document-->
							<td><a href="login.php">Login</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

