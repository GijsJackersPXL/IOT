<!DOCTYPE HTML>

<?php 

$servername = "localhost";
$username = "student_11901795";
$password = "oBrGCikWH85f";
$dbname ="student_11901795";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM GegevensIOT WHERE SensorID = 1";
$result = mysqli_query($conn,$sql);

$dataPoints = array();

while($row = mysqli_fetch_array($result)) {
	$Time = strtotime($row['DatumUpload'])*1000;
	$dataPoints[] = array("x"=>$Time,"y"=>$row['WaardeSensor']);  	
}


$sql="SELECT * FROM GegevensIOT WHERE SensorID = 2";
$result = mysqli_query($conn,$sql);

$dataPoints2=array();

while($row = mysqli_fetch_array($result)) {
	$Time = strtotime($row['DatumUpload'])*1000;
	$dataPoints2[] = array("x"=>$Time,"y"=>$row['WaardeSensor']);
}

mysqli_close($conn);
?>

<html>
    <head>
        <script>
            window.onload = function() {

            var dataPoints = [];

            var options =  {
                animationEnabled: true,
                zoomEnabled: true,
                theme: "dark2",
                title: {
                    text: "Gegevens IOT"
                },
                axisX: {
                    title: "Tijdstip",
                },

                axisY: {
                    title: "Waarde",
                },

                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries
                },

                data: [{
                    type: "line",
                    name: "Temperatuur",
                    markerSize: 5,
                    xValueFormatString: "DD/MM/YYYY hh:mm:ss",
                    xValueType: "dateTime",
                    yValueFormatString: "## °C",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                },{
                    type: "line",
                    name: "Vochtigheid",
                    markerSize: 5,
                    xValueFormatString: "DD/MM/YYYY hh:mm:ss",
                    xValueType: "dateTime",
                    yValueFormatString: "##,##%",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                }]
            };

            $("#chartContainer").CanvasJSChart(options);

            function toggleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                e.chart.render();
            }
            }

        </script>

    </head>
    <body>
        <div id="chartContainer" style="height: 70%; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    </body>
</html>