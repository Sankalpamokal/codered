<?php include 'config.php';
 
$mail = $_GET['id'];							 	 		

$sql = "SELECT fname,username,mobile FROM individual WHERE indid=$mail";							 	 		
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['report']))
    {
$rname = $row["fname"];
$remail = $row["username"];
$rmobile = $row["mobile"];	
$msg = $_POST["msg"];

$rmsg = "
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
	<h2>Donor reported</h2>
    <table>
    <tr>
    <th>Ind id</th>
    <td>$mail</td>	
    </tr>
	<tr>
    <th>Name</th>
    <td>$row[fname]</td>
    </tr>
    <tr>
    <th>Email</th>
    <td>$row[username]</td>
    </tr>
    <tr>
    <th>Mobile</th>
    <td>$row[mobile]</td>
    </tr>
    <tr>
    <th>Message</th>
	<td>$msg</td>
    </tr>
    </table>
	</center>
    </body>
    </html>
    ";

$headers = 'From: projectcodered2018@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';
$sql = "INSERT INTO report(indid, fname, username, mobile, msg)
VALUES('$mail','$row[fname]','$row[username]','$row[mobile]','$msg')";
$result1 = mail("projectcodered2018@gmail.com", "Reporting Wrong Information", $rmsg, $headers);
if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Reported Successfully');
window.location='needblood.php';
</script>";
} else {
echo "error";
}
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel="stylesheet" href="styles.css">
	<style>
	body {
            background-color: red;
			            font-family:Comic Sans MS;

        }
        * {box-sizing: border-box;}


        input[type=submit] {
			margin-left:40%;
			margin-right:40%;
			width:20%;
            background-color: grey;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
			font-size:1vw;
        }
	input[type=text],textarea{
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
label{
	font-size:1.2vw;
}
        input[type=submit]:hover {
            background-color: black;
        }

        .container {
			margin:auto;
            border-radius: 10px;
            background-color: #f2f2f2;
            padding: 40px;
            width:60%;
        }
		
			@media screen and (max-width:400px){
  
	.container {
    border-radius: 20px;
    background-color: #f2f2f2;
    padding: 20px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    width:90%;
        }

}
	</style>
</head>
<body>
<center>
<h4 style="font-size: 2.5vw;color:black;">Report inappropriate information</h4>
<div class="container">
<form action=" " method="post"> 

	<h2>Name of donor&emsp;<?php echo $row["fname"]; ?></h2>
	<label for="msg">Enter Your Message</label><br/><br/>
        <textarea rows="4" cols="50" id="msg" name="msg" placeholder="Enter Your Message..."></textarea>
		<br/>
		<br/>
 <input type="submit" id="report" name="report" value="Report" style="font-family:Comic Sans MS;" formaction=" "><br/><br/>
	
	</form>		
	</div>
	</center>
	</body>
	</html>