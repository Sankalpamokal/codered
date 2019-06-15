<?php include 'config.php';
$mail = $_POST["mail"];							 	 		
$msg = $_POST["msg"];							 	 		

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$sql = "SELECT username FROM individual WHERE indid='$mail'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$headers = 'From: projectcodered2018@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';

$result1 = mail($row['username'], "Request For Blood",$msg, $headers);
if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Email Sent Successfully');
window.location='needblood.php';
</script>";
} else {
echo "<script type='text/javascript'>alert('Email Sent Successfully');
window.location='needblood.php';
</script>";
}
}
$conn->close();
?>