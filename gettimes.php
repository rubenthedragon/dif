<?php
    require 'databaseconnectie.php';
    $date = $_GET["date"];
    $room = $_GET["room"];

    if($date)
    {
        $query = $conn->prepare("SELECT tijd FROM reservering WHERE datum = :Datum AND nummer = :Nummer"); 
        $query->execute(['Datum' => $date,
                         'Nummer' => $room]); 
        $result = $query->fetchAll();
        foreach($result as $something){
            echo $something["tijd"];
            echo ",";
        }
    }     
?>