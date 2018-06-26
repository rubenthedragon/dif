<?php
    //Verwijzing naar het bestand om te connecten met de database
    require 'databaseconnectie.php';
    //variabelen 
    $gebruiker = $_GET["gebruiker"];
    $room = $_GET["room"];
    $tijd = $_GET["tijd"];
    $datum = $_GET["datum"];
    
    if($gebruiker)
    {   
        //sql query
        $query = $conn->prepare("INSERT INTO reservering (nummer, datum, gebruiker, tijd)
                                 VALUES (:Nummer, :Datum, :Gebruiker, :Tijd)"); 

        //voer query uit waar nummer is $room, datum is $datum, gebruiker is $gebruiker en tijd is $tijd
        $results = $query->execute(array(
            ":Nummer" => $room,
            ":Datum" => $datum,
            ":Gebruiker" => $gebruiker,
            ":Tijd" => $tijd		
        ));

        //echo de gegevens van de variabelen
        echo $gebruiker;
        echo $room;
        echo $tijd;
        echo $datum;
    }
    else
    {
        echo "nope";
    }    
?>