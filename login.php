<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!--Verwijst naar het mainv2 document(css)-->
    <link rel="stylesheet" type="text/css" media="screen" href="mainv2.css" />
    <!--Verwijst naar het slideshow document(js)-->
    <script src="slideshow.js"></script>
</head>
<body>
    <div class="mid">
        <div class="logo"><img name="slide" width="300" height="200"></div>     
        <div class="round">
            <div class="formbox">
                <table>
                    <!--form methode, actie naar waar hij toe verwijst-->
                    <form class="loginf" method="post" action="loginCode.php">
                        <tr>
                            <!--Maak text box aan met tijdelijke invulling, de tekst invullen is verplicht-->
                            <td>E-mail: </td> <td><input type="text" name="email" placeholder="E-mail*" required></td>
                        </tr>
                        <tr>
                            <!--Maak wachtwoord box aan met tijdelijke invulling, invullen is verplicht-->
                            <td>Wachtwoord:</td> <td><input type="password" name="password" placeholder="Wachtwoord*" required></td>
                        </tr>
                        <tr>
                            <!--Maak button aan-->
                            <td><input type="submit" value="Login" name="submit"></td>
                            <td><a href="WachtwoordVergeten.php">Wachtwoord vergeten</a></td>
                        </tr>
                        <tr>
                            <!--verwijzing naar document-->
                            <td><a href="Registratie.php">Aanmelden</a></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

