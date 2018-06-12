<html>
<head>
<title>Login</title>
<?php
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

$query = $conn->prepare("SELECT COUNT(`id_gebruiker`) FROM `gebruiker` WHERE `gebruikersnaam` = :username AND `wachtwoord` = :password");
$query->execute(array('username' => $username, 'password' => $password));

$count = $query->fetchColumn();

if ($count == "1"){
echo "Logged in."; // LOGIN SCRIPT  ,,, ga naar ... pagina
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

</head>
<body>
<form action="" method="POST">
<input type="text" name="username" placeholder="Username" />
<input type="password" name="password" placeholder="Password" />
<button type="submit" name="submit">Login</button>
</form>
</body>
</html> 