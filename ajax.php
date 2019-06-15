<?php
include('config.php');
global $conn;
$stateId = isset($_POST['stateId'])  ? $_POST['stateId'] : 0;
$command = isset($_POST['get'])  ? $_POST['get'] : "";
switch($command){
case "state":
$statement = "SELECT state_name, state_id FROM states where country_id=100";
$dt=mysqli_query($conn,$statement);
while($result=mysqli_fetch_array($dt))
{
	echo $result1 = "<option value=".$result['state_id'].">" .$result['state_name']. "</option>";
}
break;
case "city":
$result1 ="<option>----Select City----</option>";
$statement = "SELECT city_id,city_name FROM cities WHERE state_id=".$stateId;
$dt=mysqli_query($conn,$statement);
while($result=mysqli_fetch_array($dt))
{
	 $result1 .= "<option value=".$result['city_id'].">" .$result['city_name']. "</option>";
}
echo $result1;
break;

}
exit();
?>
