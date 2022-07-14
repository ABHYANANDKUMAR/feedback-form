<?php
header("Refresh:10");
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "mca";
$conn = mysqli_connect($servername ,$username,$dbpassword,$dbname);
if(!$conn){
    echo "connection failure";
}
echo "connection estaiblished";
$temp ="SELECT excellent FROM feedback";
$result = mysqli_query($conn, $temp);
$row = mysqli_fetch_assoc($result);
$a = $row ['excellent'];

$temp ="SELECT good FROM feedback";
$result = mysqli_query($conn,$temp);
$row = mysqli_fetch_assoc($result);
$b = $row ['good'];

$temp ="SELECT poor FROM feedback";
$result = mysqli_query($conn,$temp);
$row = mysqli_fetch_assoc($result);
$c = $row ['poor'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>feedback status</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['feedback','MRIIRC'],
          ['excellent',<?php echo $a?>],
          ['good',<?php echo $b;?>],
          ['poor',<?php echo $c;?>],
        ]);

        var options = {
          title: 'feedback form',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>

</head>
</html>


