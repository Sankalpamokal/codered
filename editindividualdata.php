<?php include 'config.php';

$fname = $_POST["fname"];							 	 	
$mobile = $_POST["mobile"];							 	 	
$gender	= $_POST["gender"];						 	 	
$username = $_POST["username"];					 	 	
$bgroup	= $_POST["bgroup"];						 	 	
$dob = $_POST["dob"];						 	 	
$weight	= $_POST["weight"];						 	 	
$state = $_POST["state"];						 	 	
$city =	$_POST["city"];					 	 	
$local = $_POST["local"];						 	 	
$password =	$_POST["password"];	
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE individual SET fname='$fname', mobile='$mobile', gender='$gender', bgroup='$bgroup', dob='$dob', weight='$weight', state='$state', city='$city', local='$local', password='$password', confirm_password='$password' WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('Data updated Successfully');
window.location='profileedit.php';
</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>