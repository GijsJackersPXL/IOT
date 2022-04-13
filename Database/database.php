<?php
    $servername = "localhost";
    $username = "student_11901795";
    $password = "oBrGCikWH85f";
    $dbname ="student_11901795";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error){
        die("connection failed: " . $conn->connect-error);
    }

    $input = $_POST['waarde'];

    $sql = "INSERT INTO IOT_GEGEVENS(SensorID, WaardeSensor, DatumUpload, Tijd)  VALUES ('AUTO_INCREMENT', $input, now(), now())";

    if($conn->query($sql) === TRUE)
    {
        echo "New record created successfully";

    } else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>