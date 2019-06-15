<?php include 'config.php';
session_start(); //always start a session in the beginning 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
if (empty($_POST['busername']) || empty($_POST['password'])) //Validating inputs using PHP code 
{ 
echo 
"Incorrect username or password"; //
} 
$inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
$inPassword = $_POST["password"]; 
$stmt= $conn->prepare("SELECT BUSERNAME, BPASSWORD, BNUMBER, BMOBILE, BNAME, BSTATE, BCITY, BLOCAL  FROM BLOODBANK WHERE BUSERNAME = ?"); //Fetching all the records with input credentials
$stmt->bind_param("s", $inUsername); //bind_param() - Binds variables to a prepared statement as parameters. "s" indicates the type of the parameter.
$stmt->execute();
$stmt->bind_result($UsernameDB, $PasswordDB, $BnumberDB, $BmobileDB, $BnameDB, $BstateDB, $BcityDB, $BlocalDB); // Binding i.e. mapping database results to new variables
//Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
if ($stmt->fetch() && ($inPassword==$PasswordDB)) 
{
$_SESSION['busername'] = $inUsername; //Storing the username value in session variable so that it can be retrieved on other pages
$_SESSION['bpassword'] = $PasswordDB;
$_SESSION['bnumber'] = $BnumberDB;
$_SESSION['bmobile'] = $BmobileDB;
$_SESSION['bname'] = $BnameDB;
$_SESSION['bstate'] = $BstateDB;
$_SESSION['bcity'] = $BcityDB;
$_SESSION['blocal'] = $BlocalDB;
header("location: bprofileedit.php"); // user will be taken to profile page
}
else
{
	$msg="Invalid username or password";
	echo"<script type='text/javascript'>alert('$msg');</script>";
} 
} 
?>
