<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Style.css">
	<script src="ShowWachtwoord.js"></script>	
	<title>Registreer</title>
</head>
<body>
	<div id="container">
		<div id="afbeeldingDIF"></div>
		<div id="registratieform">
			<div id="RegistrerenText">Registreren</div>
			<div id="MeldjenuaanText">Meld je nu aan</div> 
			<div id="register">
				<form method="post" action="DatabaseConnect.php">
					<table id= "table1">
						<tr>
							<td><h3>Gebruikersnaam:</h3></td>
							<td><input type="text" placeholder="Gebruikersnaam*" name="Gebruikersnaam" id="GebruikersNaam" required></td>
						</tr>
						<tr>
							<td><h3>Wachtwoord:</h3></td>
							<td><input type="password", , placeholder="Wachtwoord*" name="Wachtwoord", id="wachtwoordInput" required></td>
						</tr>
						<tr>
							<td><h3>Herhaal wachtwoord:</h3></td>
							<td><input type="password" placeholder="Herhaal wachtwoord*" name="HerhaalWachtwoord", id="HerhaalWachtwoordInput" onkeyup="checkPass(); return false;"required></td>
							<span id="confirmMessage" class="confirmMessage"></span>	
						</tr>
						<tr>
							<td><input type="submit" value="Registreer" name="Hoi"  ></td>
							<td>Wachtwoord zichtbaar:<input type="checkbox" onclick="myFunction()"></td>
						</tr>
						<tr class="spaceUnder">
							<td>
							<h5>Al een account?</h5>  </td>
							<td><a href="login.php">Login</a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

