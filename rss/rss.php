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

$sql = "SELECT GegevensID, SensorID, WaardeSensor, DatumUpload FROM IOT_GEGEVENS limit 10"; 
$query = mysqli_query($conn,$sql);

header("Content-type: text/xml"); 

echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<Nummer>Volgnummer van het item</Nummer>
<SensorID>De id van de sensor</SensorID>
<Waarde>Waarde van de sensor</Waarde>
<Datum>Datum van de upload </Datum>"; 

while($row = mysqli_fetch_array($query))
{
    $GegevensID=$row['GegevensID']; 
	$SensorID=$row['SensorID']; 
	$Waarde=$row['WaardeSensor']; 
	$Datum=$row['DatumUpload']; 

	echo " <item>
            <Nummer>$GegevensID</Nummer>
            <SensorID>$SensorID</SensorID>
            <Waarde>$Waarde</Waarde>
            <Datum>$Datum</Datum>
	     </item>"; 
} 
echo "</channel></rss>"; 
?>