<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ipl";
$hname = $_POST["hname"];
$hnumber = $_POST["hnumber"];	
$hemail = $_POST["hemail"];					 	 					 	 							 	 	
$hmobile = $_POST["hmobile"];							 	 							 	 	
$hstate = $_POST["hstate"];						 	 	
$hdistrict = $_POST["hdistrict"];						 	 	
$hcity = $_POST["hcity"];					 	 	
$hlocal = $_POST["hlocal"];						 	 	
$hpassword = $_POST["hpassword"];					 	 	
$hcpassword = $_POST["hcpassword"];
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO hospital(hname, hnumber, hemail, hmobile, hstate, hdistrict, hcity, hlocal, hpassword, hcpassword)
VALUES('$hname', '$hnumber', '$hemail', '$hmobile', '$hstate', '$hdistrict', '$hcity', '$hlocal', '$hpassword', '$hcpassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>