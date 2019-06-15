<?php include 'config.php';

$aemail = $_POST["username"];						 	 	
$apassword = $_POST["password"];	
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE admin SET apassword='$apassword' WHERE aemail='$aemail'";

if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Profile updated successfully');
window.location='aprofileedit.php';
</script>";	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>