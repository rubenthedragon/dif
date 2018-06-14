
<?php
session_start();
try {
require 'databaseconnectie.php';
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo 'ERROR: ' . $e->getMessage();
}

if (isset($_POST['submit'])) {

if(isset($_POST['email'])) {

if(isset($_POST['password'])) {

$username = $_POST['email'];
$password = $_POST['password'];

$username = filter_var($username, FILTER_SANITIZE_STRING);
$password = filter_var($password, FILTER_SANITIZE_STRING);

$query = $conn->prepare("SELECT * FROM `gebruiker` WHERE `email` = :email");
$query->execute(array('email' => $username));

$data = $query->fetch();
/* //zonder hash//
if ($count == "1"){
header('Location: plattegrondv3.php?username='+$username+'&'+$password); // LOGIN SCRIPT  ,,, ga naar ... pagina
} else {
echo "Gebruikersnaam is onjuist/wachtwoord combinatie is verkeerd";
}
*/
//met hash BCRYPT
if(password_verify($password, $data['wachtwoord'])){
	header("Location: plattegrondv3.php?username=$username#");
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

