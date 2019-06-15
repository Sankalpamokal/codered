<?php
	session_start();

	include ('config.php');

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(isset($_POST['submit']))
{

	$result = mysqli_query($conn, "SELECT * FROM individual WHERE username = '$username' AND password = '$password'");

	if (mysqli_num_rows($result) != 0) {
	
$_SESSION['username']=$username; //Storing the username value in session variable so that it can be retrieved on other pages
$_SESSION['password']=$password;
$_SESSION['mobile']=$MobileDB;
$_SESSION['fname']=$FnameDB;
$_SESSION['gender']=$GenderDB;
$_SESSION['bgroup']=$BgroupDB;
$_SESSION['dob']=$DobDB;
$_SESSION['weight']=$WeightDB;
$_SESSION['state']=$StateDB;
$_SESSION['city']=$CityDB;
$_SESSION['local']=$LocalDB;
header("location: profileedit.php");
		
	}  else {
	    echo "Error: " . $result . "<br>" . $conn->error;


		}
		}
		else{
    echo "Error: " . $result . "<br>" . $conn->error;
		}
	


?>