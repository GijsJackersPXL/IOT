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


$begin = $_POST["inputBegindag"];
$eind = $_POST["inputEinddag"];


if(empty($_POST['inputBegindag']) && empty($_POST['inputEinddag']))
{
    $sql="SELECT * FROM IOT_GEGEVENS WHERE SensorID = 1";
}else
{
    $sql="SELECT * FROM IOT_GEGEVENS WHERE DatumUpload BETWEEN '$begin' AND '$eind'";
}

$result = mysqli_query($conn,$sql);

$dataPoints = array();

while($row = mysqli_fetch_array($result)) {
	$Time = strtotime($row['DatumUpload'])*1000;
	$dataPoints[] = array("x" => $Time, "y" => $row['WaardeSensor']);  	
}


$sql="SELECT * FROM IOT_GEGEVENS WHERE SensorID = 2";
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
                    theme: "light",
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
                        xValueFormatString: "DD/MM/YY hh:mm:ss",
                        xValueType: "dateTime",
                        yValueFormatString: "## °C",
                        showInLegend: true,
                        markerSize: 5,
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    },{
                        type: "line",
                        name: "Vochtigheid",
                        xValueFormatString: "DD/MM/YYYY hh:mm:ss",
                        xValueType: "dateTime",
                        yValueFormatString: "##,## %",
                        showInLegend: true,
                        markerSize: 5,
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