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

    $sql = "select id, word, score from example order by score desc";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        //output data of each row
        while($row = $result->fetch_assoc()){
            ?>
                <a href="?id=<?php print ($row["id"] ); ?>">
                    <?php print ($row["word"]); ?>
                    <i>(<?php print( $row["score"]); ?>)</i>
                </a><br/>
            <?php
        }
    }
    else{
        echo "0 results"
    }
    $conn->close();
?>