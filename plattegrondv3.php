<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    session_id($id);
    session_start();
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" media="screen" href="mainv2.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="content">
        <div class="pgwd">
            <div class="details" id="details">
                <p class="roomname" id="roomname"></p>
                <div class="roomdetails">
                    <table class="roomdetailstable">
                        <tr class="detailtable">
                            <!--voorzieningen van een ruimte-->
                        </tr>
                        <tr class="detailtable">
                            <!--data van de voorzieningen van een ruimte-->
                            <td class="detailtable" id="stoelData"></td>
                            <td class="detailtable" id="tafelData"></td>
                            <td class="detailtable" id="stopData"></td>
                            <td class="detailtable" id="beamData"></td>
                        </tr>
                    </table>
                </div>
                <p class="datumtext" id="datumtext">yyyy-mm-dd</p>
                <input class="datum" id="datum">
                <!--maakt een kalender aan met onclick verwijzing naar showtimezajax-->
                <div class="datebutton" type="button" onclick="showtimezajax()"><p class="datebuttontext">Selecteer</p></div>
                <div id="timebuttons">
                    <!--Buttons met onclick functie en aparte id-->
                    <dif class="timebutton" id="time1" type="button" onclick="timeonclick(1)"><p>9:00 - 10:00</p></dif>
                    <dif class="timebutton" id="time2" type="button" onclick="timeonclick(2)"><p>10:00 - 11:00</p></dif>
                    <dif class="timebutton" id="time3" type="button" onclick="timeonclick(3)"><p>11:00 - 12:00</p></dif>
                    <dif class="timebutton" id="time4" type="button" onclick="timeonclick(4)"><p>12:00 - 13:00</p></dif>
                    <dif class="timebutton" id="time5" type="button" onclick="timeonclick(5)"><p>13:00 - 14:00</p></dif>
                    <dif class="timebutton" id="time6" type="button" onclick="timeonclick(6)"><p>14:00 - 15:00</p></dif>
                    <dif class="timebutton" id="time7" type="button" onclick="timeonclick(7)"><p>15:00 - 16:00</p></dif>
                    <dif class="timebutton" id="time8" type="button" onclick="timeonclick(8)"><p>16:00 - 17:00</p></dif>
                    <dif class="timebutton" id="reserveerbtn" type="button" onclick="reserve()"><p>reserveer</p></dif>
                </div>
            </div>
            <!--etage 1-->
            <div class="pg" id="floor1p">
                <div class="ruimte" id="ruimte1" id="DIF1.01" type="button" onclick="roomajax('DIF1.01')"></div>
            </div>
            <!--etage 2-->
            <div class="pg" id="floor2p">
                <div class="ruimte" id="ruimte2" id="DIF2.01" type="button" onclick="roomajax('DIF2.01')"></div>                     
            </div>
            <!--etage 3-->
            <div class="pg" id="floor3p">
                <div class="ruimte" id="ruimte3" id="DIF3.01" type="button" onclick="roomajax('DIF3.01')"></div>          
            </div>
        </div>

        <div class="floorlist">
            <div class="floorbox" id="floor1" type="button" onclick="showfloor(1)">
                <div class="floors">
                        <div class="floorsquare" id="onefloorone"></div>
                </div>
                <div class="floornr">
                    <p class="floortext">1</p>
                </div>
            </div>

            <div class="floorbox" id="floor2" type="button" onclick="showfloor(2)">
                <div class="floors">
                        <div class="floorsquare" id="twofloorone"></div>
                        <div class="floorsquare" id="twofloortwo"></div>
                </div>
                <div class="floornr">
                        <p class="floortext">2</p>
                </div>
            </div>

            <div class="floorbox" id="floor3" type="button" onclick="showfloor(3)">
                <div class="floors">
                        <div class="floorsquare" id="threefloorone"></div>
                        <div class="floorsquare" id="threefloortwo"></div>
                        <div class="floorsquare" id="threefloorthree"></div>
                </div>
                <div class="floornr">
                        <p class="floortext">3</p>
                </div>
            </div>  
            
            <!--uitloggen vakje met onclick verwijzing naar het login document-->
            <div class="floorbox" id="uitloggen" type="button" onclick='loggingout("<?php print $id ?>")'>
                <p>Uitloggen</p>
            </div>
            
            <div id= "profilePic" onclick="openProfilePopup()">
                <p><img src="profile.png"></p>
            </div>  

            <div id = "naam" onclick="openProfilePopup()">
                <p id="usernameText"><h3><?php echo  $_SESSION["username"]; ?></h3></p>
            </div>

            <div id="popup">
                <div id="checkMark"><img src="checkMark.png"></div>
                <div id="succes"><h2 id="failpasstext"></h2></div>
                <div id="close_popup" title="Sluiten" onclick="closePopup()"><p>X</p></div>
            </div>

            <div id="profilePopup">
                <div id="profileAfb"><img src="resources/anonymous.png"></div>
                <div id="gebruikerAdmin"><h2><?php echo "Gebruiker"; ?></h2></div>
                <div id="line"></div>
                <div id="profiledatatable">
                    <table id="profiledata">
                        <tr>
                            <td><h2>Email:</h2></td>
                            <td><h2><?php echo $_SESSION["email"]; ?></h2></td>
                        </tr>
                        <tr>
                            <td><h2>Naam:</h2></td>
                            <td><h2><?php echo $_SESSION["username"]; ?></h2></td>
                        </tr>
                    </table>
                </div>
                <div id="close_popup" title="Sluiten" onclick="closeProfilePopup()"><p>X</p></div>
            </div>

            <script type="text/javascript">
                    var popup = document.getElementById("popup")
                    var profilepopup = document.getElementById("profilePopup")

                    function openPopup()
                    {
                        popup.style.display = "block";
                    }

                    function closePopup()
                    {
                        popup.style.display = "none";
                    }

                     function openProfilePopup()
                    {   
                        profilepopup.style.display = "block";

                    }

                    function closeProfilePopup()
                    {
                        profilepopup.style.display = "none";
                    }
            </script>

        </div>
    </div>
</body>
</html>