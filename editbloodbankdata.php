<?php include 'config.php';

$bname = $_POST["bname"];
$bnumber = $_POST["bnumber"];	
$busername = $_POST["busername"];					 	 					 	 							 	 	
$bmobile = $_POST["bmobile"];							 	 							 	 	
$state = $_POST["state"];						 	 	
$city = $_POST["city"];					 	 	
$blocal = $_POST["blocal"];						 	 	
$bpassword = $_POST["bpassword"];					 	 	
$bcpassword = $_POST["bcpassword"];
$bfile = $_POST["bfile"];
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE bloodbank SET bname='$bname', bnumber='$bnumber', bmobile='$bmobile', bstate='$state', bcity='$city', blocal='$blocal', bpassword='$bpassword', bcpassword='$bcpassword' WHERE busername='$busername'";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Data updated Successfully');
window.location='bprofileedit.php';
</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>