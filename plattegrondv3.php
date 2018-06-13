<?php 

session_start();
if(!isset($_SESSION["username"]))
{
    echo "Je bent niet ingelogt";
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
            <div class="details">
                <p class="roomname" id="roomname"></p>
                <p class="occupied">bezet</p>
                <div class="roomdetails">
                    <table class="roomdetailstable">
                        <tr class="detailtable">
                            <td class="detailtable">Stoelen</td>
                            <td class="detailtable">Tafels</td>
                            <td class="detailtable">Stopcontacten</td>
                            <td class="detailtable">Beamer</td>
                        </tr>
                        <tr class="detailtable">
                            <td class="detailtable" id="stoelData"></td>
                            <td class="detailtable" id="tafelData"></td>
                            <td class="detailtable" id="stopData"></td>
                            <td class="detailtable" id="beamData"></td>
                        </tr>
                    </table>
                </div>
            </div>           
            <div class="pg" id="floor1p">
                <div class="ruimte" id="ruimte1" id="DIF1.01" type="button" onclick="ajax('DIF1.01')"></div>
            </div>
            <div class="pg" id="floor2p">
                <div class="ruimte" id="ruimte2" id="DIF2.01" type="button" onclick="ajax('DIF2.01')"></div>                     
            </div>
            <div class="pg" id="floor3p">
                <div class="ruimte" id="ruimte3" id="DIF3.01" type="button" onclick="ajax('DIF3.01')"></div>          
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
        </div>
    </div>
</body>
</html>
