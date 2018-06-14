<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="mainv2.css" />
    <script src="slideshow.js"></script>
</head>
<body>
    <div class="mid">
        <div class="logo"><img name="slide" width="300" height="200"></div>     
        <div class="round">
            <div class="formbox">
                <table>
                    <form class="loginf" method="post" action="loginCode.php">
                        <tr>
                            <td>E-mail: </td> <td><input type="text" name="email" placeholder="E-mail*" required></td>
                        </tr>
                        <tr>
                            <td>Wachtwoord:</td> <td><input type="password" name="password" placeholder="Wachtwoord*" required></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Login" name="submit"></td>
                            <td><a href="WachtwoordVergeten.php">Wachtwoord vergeten</a></td>
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

