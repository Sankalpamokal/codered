<?php 
	include('config.php');
	$sql = "Select COUNT(bgroup) from individual where bgroup = 'A+'";
	$sql1 = "Select COUNT(bgroup) from individual where bgroup = 'A-'";
	$sql2 = "Select COUNT(bgroup) from individual where bgroup = 'B+'";
	$sql3 = "Select COUNT(bgroup) from individual where bgroup = 'B-'";
	$sql4 = "Select COUNT(bgroup) from individual where bgroup = 'O+'";
	$sql5 = "Select COUNT(bgroup) from individual where bgroup = 'O-'";
	$sql6 = "Select COUNT(bgroup) from individual where bgroup = 'AB+'";
	$sql7 = "Select COUNT(bgroup) from individual where bgroup = 'AB-'";
	?>
	<!DOCTYPE html>
<html>
  <head>
      <title>JavaScript Pie Chart</title>
      <script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
      <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
  </head>
  <body>
    <div id="container" style="width: 100%; height: 100%"></div>
	
    <script>
// set the data
var data = [
    {x: "A+", value: $sql},
    {x: "A-", value: $sql1},
    {x: "B+", value: $sql2},
    {x: "B-", value: $sql3},
    {x: "O+", value: $sql4},
    {x: "O-", value: $sql5`},
    {x: "AB+", value: $sql6},
    {x: "AB-", value: $sql7}
];

anychart.onDocumentReady(function() {

  // set the data
  var data = [
      {x: "A+", value: $sql},
    {x: "A-", value: $sql1},
    {x: "B+", value: $sql2},
    {x: "B-", value: $sql3},
    {x: "O+", value: $sql4},
    {x: "O-", value: $sql5`},
    {x: "AB+", value: $sql6},
    {x: "AB-", value: $sql7}
  ];

  // create the chart
  var chart = anychart.pie();

  // set the chart title
  chart.title("Blood donation in month of Ocober");

  // add the data
  chart.data(data);

  // display the chart in the container
  chart.container('container');
  chart.draw();

});
    </script>
	
  </body>
</html>