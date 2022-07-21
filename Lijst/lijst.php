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
    // $sql = mysqli_query($conn,'SELECT AVG(WaardeSensor) FROM IOT_GEGEVENS');
    
    $input = $_POST["ids"];

    if ($input == 1){
        $sql = mysqli_query($conn,'SELECT AVG(WaardeSensor) FROM IOT_GEGEVENS WHERE SensorID = 1');
    }elseif ($input == 2){
        $sql = mysqli_query($conn,'SELECT AVG(WaardeSensor) FROM IOT_GEGEVENS WHERE SensorID = 2');
    }

    while($row = mysqli_fetch_array($sql)){
        echo $row['AVG(WaardeSensor)'].'<br>';
    }

?>