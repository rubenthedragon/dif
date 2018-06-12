<?php
    $conn = new PDO("mysql:host=localhost:3306;dbname=dif;", "root", "pokemon");
    require 'room.php';
    $id = $_GET["roomname"];

    if($_GET["roomname"])
    {
        $query = $conn->prepare("SELECT * FROM room WHERE nummer = :nummer"); 
        $query->execute(['nummer' => $id]); 
        $result = $query->fetch(PDO::FETCH_ASSOC);       
        echo $result["nummer"];
        echo ",";
        echo $result["stoelen"];
        echo ",";
        echo $result["tafels"];
        echo ",";
        echo $result["stopcontacten"];
        echo ",";
        echo $result["beamer"];
    }     

?>