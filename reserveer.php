<?php
    require 'databaseconnectie.php';
    $gebruiker = $_GET["gebruiker"];
    $room = $_GET["room"];
    $tijd = $_GET["tijd"];
    $datum = $_GET["datum"];
    
    if($gebruiker)
    {
        $query = $conn->prepare("INSERT INTO reservering (nummer, datum, gebruiker, tijd)
                                 VALUES (:Nummer, :Datum, :Gebruiker, :Tijd)"); 

        $results = $query->execute(array(
            ":Nummer" => $room,
            ":Datum" => $datum,
            ":Gebruiker" => $gebruiker,
            ":Tijd" => $tijd		
        ));

        echo $gebruiker;
        echo $room;
        echo $tijd;
        echo $datum;
    }     
?>