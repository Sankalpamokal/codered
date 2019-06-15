<?php include 'config.php';

$fname = $_POST["fname"];							 	 	
$email = $_POST["email"];					 	 	
$password =	$_POST["password"];					 	 	
$dob = $_POST["dob"];						 	 	
$gender	= $_POST["gender"];						 	 	

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$sql = "INSERT INTO formdata(fname, email, password, dob, gender)
VALUES('$fname', '$email', '$password', '$dob', '$gender')";

if ($conn->query($sql) === TRUE) 
{
echo "<script type='text/javascript'>alert('Registered Successfully');
window.location='home.html';
</script>";
} else {
echo "<script type='text/javascript'>alert('Email already exists');
window.location='form.php';
</script>";
}
}
$conn->close();
?>