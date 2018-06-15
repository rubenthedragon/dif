<?php
//Verwijzing naar het bestand om te connecten met de database
    require 'databaseconnectie.php';
    //variabelen
    $date = $_GET["date"];
    $room = $_GET["room"];

    if($date)
    {   
        //sql query
        $query = $conn->prepare("SELECT tijd FROM reservering WHERE datum = :Datum AND nummer = :Nummer"); 
        //voer query uit waar datum is $datum en nummer is $room
        $query->execute(['Datum' => $date,
                         'Nummer' => $room]);
        //haal gegevens op 
        $result = $query->fetchAll();
        foreach($result as $something){
            //echo tijd
            echo $something["tijd"];
            echo ",";
        }
    }     
?>