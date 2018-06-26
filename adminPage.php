<?php
require 'databaseconnectie.php';
$queryR = $conn->prepare("SELECT * FROM reservering");
$queryG = $conn->prepare("SELECT id, naam, email FROM gebruiker");
$queryR->execute();
$queryG->execute();
$roomnames = array("DIF1.01", "DIF2.01", "DIF3.01");
$tijden = array("9:00-10:00","10:00-11:00","11:00-12:00","12:00-13:00","13:00-14:00","14:00-15:00","15:00-16:00","16:00-17:00");

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="adminStyle.css" />
    <script src="adminPage.js"></script>
</head>
    <body onload="startTime()">
        <form method="POST" action="delete.php">
            <div class="content">
                <div class="ruimtedetails">
                    <!--reserveringsinformatie-->
                    <table class="detailstable" id="ruimteTable">
                        <tr class="detailtablehead">
                            <th class="detailtablehead" >Ruimte</th>
                            <th class="detailtablehead" >Gebruiker</th>
                            <th class="detailtablehead" >Datum</th>
                            <th class="detailtablehead" >Tijd</th>
                            <th class="detailtablehead" ><input type="submit" name="Update" value="Update"></th>
                            <th class="detailtablehead" ><input type="submit" name="Delete" value="Delete"></th>
                        </tr>
                        <?php while ($rowR = $queryR->fetch()) : ?>
                        <tr>
                            <td>
                            <center>
                                <p>
                                    <?php echo $rowR["nummer"];?> =>
                                    <select name="roomSel">
                                        <?php
                                            foreach($roomnames as $name) {
                                        ?>
                                        <option ><?php echo $name; ?></option>
                                            <?php } ?>
                                    </select>
                                </p>
                            </center>
                            </td>
                            <td>      
                                <center>
                                    <?php echo $rowR["gebruiker"]; ?>
                                </center>
                            </td>
                            <td> 
                                <center>  
                                    <p>
                                        <?php echo $rowR["datum"]; ?> =>
                                        <input type="date" name="datumSel" value="<?php echo $rowR["datum"]; ?>">
                                    </p>
                                </center>
                            </td>
                            <td>
                            <center>                        
                                <p>
                                    <?php echo $rowR["tijd"];?> =>
                                    <select name="tijdSel" id="tijdSel">
                                        <?php
                                            foreach($tijden as $tijd) {
                                        ?>
                                        <option><?php echo $tijd; ?></option>
                                            <?php } ?>
                                    </select>
                                </p>
                            </center>
                            </td>
                            <td>
                                <center>
                                    <input type="checkbox" name="upd[]" value="<?php echo $rowR["nummer"]; echo ","; echo $rowR["datum"]; echo ","; echo $rowR["tijd"]; ?>">
                                </center>
                            </td>
                            <td>
                                <center>
                                    <input type="checkbox" name="verw[]" value="<?php echo $rowR["nummer"]; echo ","; echo $rowR["datum"]; echo ","; echo $rowR["tijd"]; ?>">
                                </center>
                            </td>
                        </tr>
                        <?php endwhile ?>
                        <!--gebruikersinformatie-->
                    </table>
                    <table class="detailstable" id="gebruikerInfoTable">
                        <tr class="detailtablehead">
                            <th class="detailtablehead">Gebruiker ID</th>
                            <th class="detailtablehead">Naam</th>
                            <th class="detailtablehead">E-mail</th>
                        </tr>
                        <?php while ($rowG = $queryG->fetch()) : ?>
                        <tr>
                            <td>
                                <center>
                                    <p >
                                        <?php echo $rowG["id"];?>
                                    </p>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <p >
                                        <?php echo $rowG["naam"];?>
                                    </p>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <p >
                                        <?php echo $rowG["email"];?>
                                    </p>
                                </center>
                            </td>
                        <?php endwhile ?>
                    </table>
                    <div class="datumGegevens">
                    <div id="tijd"></div>
                    <div id="datum"><?php echo date("l d-m-y"); ?></div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

