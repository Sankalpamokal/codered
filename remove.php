<?php include 'config.php';
$mail = $_GET['id'];							 	 		
    
$sql = "update camps set approve='no' where campid='$mail'";
if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Notification removed successfully');
window.location='pcampaign.php';
</script>";
} else {
echo "error";
}
$conn->close();
?>