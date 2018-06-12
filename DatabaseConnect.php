

 <?php



$conn = new PDO("mysql:host=localhost:3306;dbname=badeend;", "root", "aly99");
if(isset($_POST['Hoi']))
	 { 
		$passwordRepeat = $_POST['HerhaalWachtwoord'];
		$username = $_POST['Gebruikersnaam'];
		$password = $_POST['Wachtwoord'];
	 	if($password == $passwordRepeat)
	 	{


		$sql = "INSERT INTO gebruiker (gebruikersnaam, wachtwoord)
   					 VALUES (:Gebruikersnaam, :Wachtwoord)";

    	$query = $conn->prepare($sql);
    	$results = $query->execute(array(
    		":Gebruikersnaam" => $username,
    		":Wachtwoord" => $password
    	));
    
    	if($results)
    	{

    		echo "Welkom: " ,$username;

    	}
    	else {
    		echo "Gebruikersnaam is al in gebruik";
    	}
} else
{
	echo "wachtwoord komt niet overeen";
}


}
 ?>


