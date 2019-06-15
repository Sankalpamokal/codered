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
$confirm_password = $_POST["confirm_password"];

if ($password == $confirm_password)
{
$sql = "INSERT INTO individual(fname, mobile, gender, username, bgroup, dob, weight, state, city, local, password, confirm_password)
VALUES('$fname', '$mobile', '$gender', '$username', '$bgroup', '$dob', '$weight', '$state', '$city', '$local', '$password', '$confirm_password')";

if ($conn->query($sql) === TRUE) 
{
echo "<script type='text/javascript'>alert('Registered Successfully');
window.location='login.php';
</script>";
} else {
echo "<script type='text/javascript'>alert('Email already exists');
window.location='login.php';
</script>";
}
}
else
{
echo "<script type='text/javascript'>alert('Password does not matched ');
window.location='individual.php';
</script>";
}
$conn->close();
?>