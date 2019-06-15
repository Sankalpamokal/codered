<?php include 'config.php';

$cname = $_POST["cname"];
$cemail = $_POST["cemail"];					 	 					 	 							 	 	
$cmobile = $_POST["cmobile"];							 	 							 	 	
$csubject = $_POST["csubject"];	
// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO contact(cname, cemail, cmobile, csubject)
VALUES('$cname', '$cemail', '$cmobile', '$csubject')";
$msg = "
    <html>
	<head><style>table{
		width:100%;
		border:1px solid black;
		padding:10px;
		}
		td{
		text-align:center;
		border:1px solid black;
		padding:20px;
	}</style></head>
    <body>
    <table>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Subject</th>
    </tr>
    <tr>
    <td>$cname</td>
    <td>$cemail</td>
    <td>$cmobile</td>
    <td>$csubject</td></tr>
    </table>
    </body>
    </html>
    ";
$headers = 'From: projectcodered2018@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';

$result1 = mail("projectcodered2018@gmail.com", "Contact Information",$msg, $headers);

if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('New record created successfully');
window.location='contact.html';
</script>";	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>