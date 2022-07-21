<!-- <?php
    $servername = "localhost";
    $username = "student_11901795";
    $password = "oBrGCikWH85f";
    $dbname ="student_11901795";

    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error){
        die("connection failed: " . $conn->connect-error);
    }

    $SensorID = "1";
    
    $sql = "SELECT AVG(WaardeSensor) FROM IOT_GEGEVENS WHERE SensorID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $SensorID);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($AVG(WaardeSensor));
    
    while($row = $stmt->fetch())
    {
        echo $row['AVG(WaardeSensor)'].'<br>';
    }
    $stmt->close();
 
?> -->