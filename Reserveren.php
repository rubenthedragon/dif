<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="Style.css">
	<script src="ShowWachtwoord.js"></script>

	<title>Reserveren</title>
</head>
<body>

<div id="container2">

<ul>
	<li><a>Profile</a>
		<ul>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</li>
</ul>

	<div id="ReserverenBox">				
	
	<div class= "row0"><h1>Reserveren</h1> </div>

	<div class="row1">

  <div><input type="button" class="column" id="column1" value="9:00 - 10:00" onclick="columnClick1()"></div>

  <div><input type="button"  class="column" id="column2" value="10:00 - 11:00" onclick="columnClick2()"></div>
  
	</div>

	<div class="row2">

  <div> <input type="button" class="column" id="column3" value="11:00 - 12:00" onclick="columnClick3()"></div>

  <div><input type="button" class="column" id="column4" value="12:00 - 13:00" onclick="columnClick4()"></div>
  
	</div>

	<div class="row3">

  <div> <input type="button" class="column" id="column5" value="13:00 - 14:00" onclick="columnClick5()" ></div>

  <div><input type="button" class="column" id="column6"value="14:00 - 15:00" onclick="columnClick6()"></div>
  
	</div>

	<div class="row4">

  <div><input type="button"  class="column" id="column7" value="15:00 - 16:00" onclick="columnClick7()"></div>

  <div><input type="button"  class="column" id="column8" value="16:00 - 17:00" onclick="columnClick8()"></div>

	</div>




  <div class="row5">
  <div><input type="button"  class="column" id="reserverenBoxje" value="Reserveer" onclick="columnClickReserveren()"></div>
 
  </div>


</div>



</body>
</html>