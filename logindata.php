<?php include 'config.php';
session_start(); //always start a session in the beginning 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code 
{ 
echo 
"Incorrect username or password"; //
header("location: login.php");//You will be sent to Login.php for re-login 
} 
$inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
$inPassword = $_POST["password"]; 
$stmt= $conn->prepare("SELECT USERNAME, PASSWORD, MOBILE, FNAME, GENDER, BGROUP, DOB, WEIGHT, STATE, CITY, LOCAL  FROM INDIVIDUAL WHERE USERNAME = ?"); //Fetching all the records with input credentials
$stmt->bind_param("s", $inUsername); //bind_param() - Binds variables to a prepared statement as parameters. "s" indicates the type of the parameter.
$stmt->execute();
$stmt->bind_result($UsernameDB, $PasswordDB, $MobileDB, $FnameDB, $GenderDB, $BgroupDB, $DobDB, $WeightDB, $StateDB, $CityDB, $LocalDB); // Binding i.e. mapping database results to new variables
//Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
if ($stmt->fetch() && ($inPassword==$PasswordDB)) 
{
$_SESSION['username']=$inUsername; //Storing the username value in session variable so that it can be retrieved on other pages
$_SESSION['password']=$PasswordDB;
$_SESSION['mobile']=$MobileDB;
$_SESSION['fname']=$FnameDB;
$_SESSION['gender']=$GenderDB;
$_SESSION['bgroup']=$BgroupDB;
$_SESSION['dob']=$DobDB;
$_SESSION['weight']=$WeightDB;
$_SESSION['state']=$StateDB;
$_SESSION['city']=$CityDB;
$_SESSION['local']=$LocalDB;
header("location: profileedit.php"); // user will be taken to profile page
}
else
{
	$msg="Invalid username or password";
	echo"<script type='text/javascript'>alert('$msg');</script>";
} 

} 
?>
