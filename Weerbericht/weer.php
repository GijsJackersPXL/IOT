<?php
$jsonfile = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Riemst&appid=b88e8a4d3b3a06798583071cab85454c&units=metric");
$jsondata = json_decode($jsonfile);

$soortWeer = $jsondata->weather[0]->main;
$Temperatuur = $jsondata->main->temp;
$Druk = $jsondata->main->pressure;
$minTemp = $jsondata->main->temp_min;
$maxTemp = $jsondata->main->temp_max;
$Wind = $jsondata->wind->speed;
$Vochtigheid = $jsondata->main->humidity;
//$desc = $jsondata->weather[0]->description;

echo "<H2>Het weer in Riemst: </H2>";
echo "Wat voor weer is het in Riemst: ", $soortWeer, "<br>";
echo "Temperatuur: ", $Temperatuur, " &degC <br>";
echo "Druk: ", $Druk, " hPa <br>";
echo "Minimum temperatuur: ", $minTemp, " &degC <br>";
echo "Maximum temperatuur: ",$maxTemp, " &degC <br>";
echo "Windkracht: ", $Wind, " m/s <br>";
echo "Vochtigheid: ", $Vochtigheid, " % <br>";
?>