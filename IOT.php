<?php
    $servername = "localhost";
    $username = "student_11901795";
    $password = "oBrGCikWH85f";
    $dbname ="student_11901795";
    
    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error){
        die("connection failed: " . $conn->connect-error);
    }
    
    $sql = "INSERT INTO GegevensIOT (WaardeSensor, Naam, Locatie, Plaats, Land, Email, DateOfUpload, Tijd)
            VALUES ('10.6', 'Gijs Jackers', 'Riemst', 'Thuis', 'België', 'gijs.jackers@student.pxl.be', Now(),Now());
    
    if ($conn->quey($sql) == TRUE){
        echo "New record created successfully";
    }
    els{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>