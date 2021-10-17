<?php
    $servername = "localhost";
    $username = "student_11901795";
    $password = "oBrGCikWH85f";
    $dbname ="student_11901795";

    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //check connection
    if ($conn -> connect_error){
        die("connection failed: " . $conn->connect-error);
    }

    if (insset( $_GET['word'])){
            $sql = "insert into example (word, time, score) values('" . $_GET['word'] . "', now(), 0 )";
            
            if ($conn->quey($sql) == TRUE){
                echo "New record created successfully";
            }
            els{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }else{
        ?>
            <form method ="get">
            <input type="text" name="word" />
            <input type="submit" />
            </form>
        <?php
    }
    $conn->close();
?>