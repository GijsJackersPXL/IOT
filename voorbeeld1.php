<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname ="";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error){
    die("connection failed: " . $conn->connect-error);
}

$sql = "insert into MyGuests (firstname, lastname, email) values('Gijs', 'Jackers', 'gijs.jackers@student.pxl.be')";

if ($conn->quey($sql) == TRUE){
    echo "New record created successfully";
}
els{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>