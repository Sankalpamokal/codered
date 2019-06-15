<?php
include 'config.php';
$busername = $_GET['id'];							 	 		

$sql = "UPDATE BLOODBANK SET APPROVE='yes' WHERE BUSERNAME='$busername'";

if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Blood Bank approval successful')
window.location='approvebb.php';
</script>";
}
else {
echo "error"; 
}
$conn->close();
?>