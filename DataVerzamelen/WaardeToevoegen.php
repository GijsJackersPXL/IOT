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

    $waarde = $_GET['waarde'];
    $sensorID = $_GET['SensorID'];
    
    //input inlezen
    if ($waarde != '' && $sensorID != ''){ 
        $sql = "insert into IOT_GEGEVENS (SensorID, WaardeSensor, DatumUpload) values('$sensorID', '$waarde', now())";
        
        if ($conn->query($sql) === TRUE){
            echo "New record created successfully";
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        echo "Fout!!! \n Er klopt iets niet...";
    }

    $conn->close();
?>