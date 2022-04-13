<?php

$jsonfile = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Riemst&appid=b88e8a4d3b3a06798583071cab85454c&units=metric");
$jsondata = json_decode($jsonfile);
$api_Temperatuur = $jsondata->main->temp;
$api_Druk = $jsondata->main->pressure;
$api_minTemp = $jsondata->main->temp_min;
$api_maxTemp = $jsondata->main->temp_max;
$api_Wind = $jsondata->wind->speed;
$api_Vochtigheid = $jsondata->main->humidity;
$api_desc = $jsondata->weather[0]->description;
$api_soortWeer = $jsondata->weather[0]->main;

echo "<H2>Het weer in Riemst: </H2>";
echo "Wat voor weer is het in Riemst: ", $api_soortWeer, "<br>";
echo "Temperatuur: ", $api_Temperatuur, " &degC <br>";
echo "Druk: ", $api_Druk, " hPa <br>";
echo "Minimum temperatuur: ", $api_minTemp, " &degC <br>";
echo "Maximum temperatuur: ",$api_maxTemp, " &degC <br>";
echo "Windkracht: ", $api_Wind, " m/s <br>";
echo "Vochtigheid: ", $api_Vochtigheid, " % <br>";

echo "<br><br>";
echo $api_desc, "<br>";

?>