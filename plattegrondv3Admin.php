<?php  
    session_start();
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
                            <td class="detailtable"><img src="Chair.png"></td>
                            <td class="detailtable"><img src="Table.png"></td>
                            <td class="detailtable"><img src="PowerOutlet.png"></td>
                            <td class="detailtable"><img src="Beamer.png"></td>
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
                    <dif class="timebutton" id="reserveerbtn" type="button" onclick="reserve(), openPopup()"><p>reserveer</p></dif>
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
            <div class="floorbox" id="uitloggen" onclick="location.href='login.html'">
                <p>Uitloggen</p>
            </div>
            
            <!--admin knop met verwijzing naar de admin pagina-->
            <div class="floorbox" id="adminpage" onclick="location.href='adminPage.php'">
                <p>Administratie</p>
            </div>

             <div id= "profilePic">
                <img src="profile.png">
            </div>  

            <div id = "naam">
                <h3><?php echo  $_SESSION["username"]; ?></h3>
            </div>

            <div id="popup">
                <div id="checkMark"><img src="checkMark.png"></div>
                <div id="succes"><h2>Succesvol gereserveerd!</h2></div>
                <div id="close_popup" title="Sluiten" onclick="closePopup()"><p>X</p></div>
            </div>

            <script type="text/javascript">
                    var popup = document.getElementById("popup")

                    function openPopup()
                    {
                        popup.style.display = "block";
                    }

                    function closePopup()
                    {
                        popup.style.display = "none";
                    }
            </script>

        </div>
    </div>
</body>
</html>

            <script>
            function reserve()
            {
                var data = sendres();
                reserveajax(data);
            }

            function sendres()
            {
                //variabelen
                var user = getQueryVariable("username");
                var datebox = document.getElementById("datum");
                var datetext = datebox.value;
                
                var time;
                var time1 = document.getElementById('time1');
                var time2 = document.getElementById('time2');
                var time3 = document.getElementById('time3');
                var time4 = document.getElementById('time4');
                var time5 = document.getElementById('time5');
                var time6 = document.getElementById('time6');
                var time7 = document.getElementById('time7');
                var time8 = document.getElementById('time8');
                
                //verander kleur als er op geklikt is
                if(time1.style.backgroundColor == "yellow"){
                    time = "9:00-10:00"
                }
                else if(time2.style.backgroundColor == "yellow"){
                    time = "10:00-11:00"
                }
                else if(time3.style.backgroundColor == "yellow"){
                    time = "11:00-12:00"
                }
                else if(time4.style.backgroundColor == "yellow"){
                    time = "12:00-13:00"
                }
                else if(time5.style.backgroundColor == "yellow"){
                    time = "13:00-14:00"
                }
                else if(time6.style.backgroundColor == "yellow"){
                    time = "14:00-15:00"
                }
                else if(time7.style.backgroundColor == "yellow"){
                    time = "15:00-16:00"
                }
                else if(time8.style.backgroundColor == "yellow"){
                    time = "16:00-17:00"
                }

                var namebox = document.getElementById("roomname");
                var nametext = namebox.textContent;
                var package = "?room="+nametext+"&datum="+datetext+"&gebruiker="+user+"&tijd="+time;
                return package;
            }

            function getQueryVariable(variable)
            {
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i=0;i<vars.length;i++) {
                        var pair = vars[i].split("=");
                        if(pair[0] == variable){return pair[1];}
                }
                return(false);
            }
            </script>