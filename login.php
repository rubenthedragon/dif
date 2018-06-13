<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="mainv2.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="mid">
        <div class="logo"></div>      
        <div class="round">
            <div class="formbox">
                <table>
                    <form class="loginf" method="post" action="loginCode.php">
                        <tr>
                            <td>Gebruikersnaam: </td> <td><input type="text" name="email" placeholder="Gebruikersnaam"></td>
                        </tr>
                        <tr>
                            <td>Wachtwoord:</td> <td><input type="password" name="password" placeholder="Wachtwoord"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Login" name="submit"></td>
                            <td><a href="plattegrondv3.html">Wachtwoord vergeten</a></td>
                        </tr>
                        <tr>
                            <td><a href="Registratie.php">Aanmelden</a></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

