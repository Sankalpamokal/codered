<?php include 'config.php';
 
$mail = $_GET['id'];							 	 		
    

$sql = "DELETE FROM individual WHERE indid=$mail";							 	 		
if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('User deleted successfully');
window.location='musers.php';
</script>";	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

