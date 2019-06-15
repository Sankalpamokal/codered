<?php
include 'config.php';
$pbrname = $_POST["pbrname"];							 	 	
$pbrmobile = $_POST["pbrmobile"];							 	 	
$pbremail = $_POST["pbremail"];					 	 	
$pbrbgroup = $_POST["pbrbgroup"];						 	 	
$pbrdob = $_POST["pbrdob"];						 	 	
$pbrweight = $_POST["pbrweight"];
$pbrgender = $_POST["pbrgender"];						 	 						 	 	
$pbrstate = $_POST["pbrstate"];						 	 	
$pbrcity = $_POST["pbrcity"];					 	 	
$pbrlocal = $_POST["pbrlocal"];						 	 	


$sql = "INSERT INTO pbr(pbrname, pbrmobile, pbremail, pbrbgroup, pbrdob, pbrweight, pbrgender, pbrstate, pbrcity, pbrlocal)
VALUES('$pbrname', '$pbrmobile', '$pbremail', '$pbrbgroup', '$pbrdob', '$pbrweight', '$pbrgender', '$pbrstate', '$pbrcity', '$pbrlocal')";

$msg = "
<html>
	<head><style>table{
		width:70%;
		border:1px solid black;
		padding:10px;
		}
		td{
		text-align:center;
		border:1px solid black;
		padding:20px;
	}</style></head>
    <body>
	<center>
	<h1>There's an emergency of blood in your area,please get in touch with recipient.</h1>
	<h2>Detail's of blood requester are mentioned below</h2>
    <table>
    <tr>
    <th>Name</th>
    <td>$pbrname</td>	
    </tr>
    <tr>
    <th>Email</th>
    <td>$pbremail</td>
    </tr>
    <tr>
    <th>Mobile</th>
    <td>$pbrmobile</td>
    </tr>
    <tr>
    <th>Bgroup</th>
    <td>$pbrbgroup</td>
    </tr>
    <tr>
    <th>Gender</th>
	<td>$pbrgender</td>
    </tr>
    <tr>
    <th>Locality</th>
    <td>$pbrlocal</td>
    </tr>
    <tr>
    <th>Posted on</th>
    <td>$pbrdob</td>
    </tr>
    </table>
	</center>
    </body>
    </html>
    ";

$sql1 = "SELECT username FROM individual WHERE state='$pbrstate' AND city='$pbrcity' AND bgroup='$pbrbgroup'";
if($result = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
		
		$headers = 'From: projectcodered2018@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';

$result1 = mail($row['username'], "Emergency Blood Needed",$msg, $headers);
			
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
}


if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('Blood request post successfully');
window.location='pbr.php';
</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>