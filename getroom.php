<?php
    //Verwijzing naar het bestand om te connecten met de database
    require 'databaseconnectie.php';
    $id = $_GET["roomname"];

    if($_GET["roomname"])
    {   //connectie, bereid sql query voor
        $query = $conn->prepare("SELECT * FROM room WHERE nummer = :nummer"); 
        //voer query uit waar nummer is $id
        $query->execute(['nummer' => $id]); 
        //Haal gegevens op
        $result = $query->fetch(PDO::FETCH_ASSOC);   
        //echo de gegevens     
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