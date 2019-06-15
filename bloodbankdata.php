			<?php include 'config.php';

$bname = $_POST["bname"];
$bnumber = $_POST["bnumber"];	
$busername = $_POST["busername"];					 	 					 	 							 	 	
$bmobile = $_POST["bmobile"];							 	 							 	 	
$state = $_POST["state"];						 	 	
$city = $_POST["city"];					 	 	
$blocal = $_POST["blocal"];
$bfile = addslashes(file_get_contents($_FILES["bfile"]["tmp_name"]));  						 	 	
$bpassword = $_POST["bpassword"];					 	 	
$bcpassword = $_POST["bcpassword"];
$approve = "no";

if ($bpassword == $bcpassword)
{
$sql = "INSERT INTO bloodbank(bname, bnumber, busername, bmobile, bstate, bcity, blocal, bpassword, bcpassword, bfile, approve)
VALUES('$bname', '$bnumber', '$busername', '$bmobile', '$state', '$city', '$blocal', '$bpassword', '$bcpassword', '$bfile', '$approve')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Registered Successfully');
window.location='blogin.php';
</script>";
} else {
echo "<script type='text/javascript'>alert('Email already exists');
window.location='blogin.php';
</script>";
}
}
else
{
echo "<script type='text/javascript'>alert('Password does not matched');
window.location='bloodbank.php';
</script>";
}
$conn->close();
?>