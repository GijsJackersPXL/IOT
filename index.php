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

    $sensorID = $_POST["ID"];
    $waarde = $_POST["waarde"];

    //input inlezen
    if (isset( $_GET['ID']) && $_GET['waarde'] != ''){
        $sql = "insert into GegevensIOT (SensorID, WaardeSensor, DatumUpload, Tijd) 
                values('" . $_GET["ID"] . "', '" . $_GET["waarde"] . "', now(), now() )";
        
        if ($conn->quey($sql) === TRUE){
            echo "New record created successfully";
        }
        els{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

$conn->close();
?>