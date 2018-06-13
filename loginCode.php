
<?php
session_start();
try {
$conn = new PDO("mysql:host=localhost:3306;dbname=badeend;", "root", "aly99");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo 'ERROR: ' . $e->getMessage();
}

if (isset($_POST['submit'])) {

if(isset($_POST['username'])) {

if(isset($_POST['password'])) {

$username = $_POST['username'];
$password = $_POST['password'];

$username = filter_var($username, FILTER_SANITIZE_STRING);
$password = filter_var($password, FILTER_SANITIZE_STRING);

$query = $conn->prepare("SELECT * FROM `gebruiker` WHERE `gebruikersnaam` = :username");
$query->execute(array('username' => $username));

$count = $query->fetch();
/* //zonder hash//
if ($count == "1"){
header('Location: plattegrondv3.php?username='+$username+'&'+$password); // LOGIN SCRIPT  ,,, ga naar ... pagina
} else {
echo "Gebruikersnaam is onjuist/wachtwoord combinatie is verkeerd";
}
*/
//met hash BCRYPT
if(password_verify($password, $count['wachtwoord'])){
	echo "right";
	header('Location: plattegrondv3.html');
} else {
echo "Gebruikersnaam is onjuist/wachtwoord combinatie is verkeerd";
}
} else {
echo "Wachtwoord mag niet leeg zijn";
}

} else {
echo "Gebruikersnaam mag niet leeg zijn";
}

}

?>

