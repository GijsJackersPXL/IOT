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
    
    $sql = "SELECT AVG(WaardeSensor) FROM IOT_GEGEVENS WHERE SensorID = 1";
    
    //$result = mysql_query("SELECT AVG(fieldName) AS avg FROM tableName");
    $row = mysql_fetch_assoc($sql);
    echo $row;



/*     $sql = "SELECT SensorID, WaardeSensor, DatumUpload FROM IOT_GEGEVENS WHERE SensorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET['SensorID']);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($SensorID, $WaardeSensor, $DatumUpload);
    
    while($row = $stmt->fetch())
    {
        echo "DatumUpload: ", $DatumUpload, "<br>";
        echo "WaardeSensor: ", $WaardeSensor, "<br> <br>";
    }
    $stmt->close();
 */
?>