<?php include 'config.php';

$oname = $_POST["oname"];							 	 	
$oemail = $_POST["oemail"];							 	 	
$ocontact = $_POST["ocontact"];						 	 	
$odate = $_POST["odate"];					 	 	
$ocomment = $_POST["ocomment"];
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO camps(oname, oemail, ocontact, odate, ocomment)
VALUES('$oname', '$oemail', '$ocontact', '$odate', '$ocomment')";

if ($conn->query($sql) === TRUE) 
{
echo "<script type='text/javascript'>alert('Event added successfully, Once approved by admin it will be live on website.');
window.location='camps.php';
</script>";
} else {
echo "error";
}

$conn->close();
?>