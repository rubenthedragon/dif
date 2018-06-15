<?php 


session_start();
session_destroy();
//verwijs naar login document
header('Location: login.php');


 ?>