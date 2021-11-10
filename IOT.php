<?php
    $servername = "localhost";
    $username = "student_11901795";
    $password = "oBrGCikWH85f";
    $dbname ="student_11901795";

    //$sql = "INSERT INTO GegevensIOT (SensorID, WaardeSensor, Naam, Locatie, Plaats, Land, Email, DatumUpload, Tijd)
    //VALUES (1,'10.6', 'Gijs Jackers', 'Riemst', 'Thuis', 'België', 'gijs.jackers@student.pxl.be', Now(),Now());
    
    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error){
        die("connection failed: " . $conn->connect-error);
    }
    
    //input inlezen
    if (isset( $_GET['WaardeSensor']) && $_GET['WaardeSensor'] != ''){
        $sql = "insert into GegevensIOT (WaardeSensor, Naam, DatumUpload, Tijd) 
                values('" . $_GET['WaardeSensor'] . "', 'Website', now(), now() )";
        
        if ($conn->quey($sql) === TRUE){
            echo "New record created successfully";
        }
        els{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    //output printen
    $sql = "select SensorID, WaardeSensor from GegevensIOT";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            ?>
                <a href="?id=<?php print ($row["SensorID"] ); ?>">
                    <?php print ($row["WaardeSensor"]); ?>
                </a><br/>
            <?php
        }
    }
    else{
        echo "0 results"
    }
    
    $conn->close();
    ?>