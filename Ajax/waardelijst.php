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

    $SensorID = "2";

    $sql = "SELECT SensorID, WaardeSensor, DatumUpload FROM IOT_GEGEVENS WHERE SensorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $SensorID);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($SensorID, $WaardeSensor, $DatumUpload);

    while($row = $stmt->fetch())
    {
        echo "<table>";
        echo "<tr>";
        echo "<th>SensorID</th>";
        echo "<td>" . $SensorID . "</td>";
        echo "<th>DatumUpload</th>";
        echo "<td>" . $DatumUpload . "</td>";
        echo "<th>WaardeSensor</th>";
        echo "<td>" . $WaardeSensor . "</td>";
        echo "</tr>";	
    }
    echo "</table>";
    $stmt->close();
?>