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

    $input = $_POST['waarde'];

    //input inlezen
    if ($input != ''){ 
        $sql = "insert into GegevensIOT (SensorID, WaardeSensor, DatumUpload, Tijd) 
                values('AUTO_INCREMENT', '$input', now(), now() )";
        
                //values('" . $_GET["ID"] . "', '" . $_GET["waarde"] . "', now(), now() )";
        
        if ($conn->query($sql) === TRUE){
            echo "New record created successfully";
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
        echo "Waarde moet een inhoud hebben";
    }

    $conn->close();
?>