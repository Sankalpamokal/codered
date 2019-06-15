<?php include 'config.php';
$mail = $_GET['id'];							 	 		

$sql = "SELECT fname,username FROM individual WHERE indid=$mail";							 	 		
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['smail']))
    {
$msg = $_POST["msg"];
$headers = 'From: projectcodered2018@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';
$sql = "INSERT INTO mailbyadmin(indid, msg)
VALUES('$mail', '$msg')";
$result1 = mail($row['username'], "Message from Codered admin", $rmsg, $headers);
if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Email Sent Successfully');
window.location='musers.php';
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
    <title>Send Message</title>
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
	input[type=text],input[type=mobile],input[type=email],textarea{
	width:100%;
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
            padding: 30px;
            width:50%;
        }
	</style>
</head>
<body>
<center>
<h4 style="font-size: 2.5vw;color:black;">Send Message to donor</h4>	</center>
<div class="container">
<form action=" " method="post"> 
	<h2>Send message to&emsp;<?php echo $row["fname"]; ?></h2>
        <textarea rows="4" cols="50" id="msg" name="msg" placeholder="Enter Your Message..."></textarea>
		<br/>
		<br/>
 <input type="submit" id="smail" name="smail" value="Send Mail" style="font-family:Comic Sans MS;" formaction=" "><br/><br/>
	
	</form>		
	</div>
	<br/>
		<br/><br/>
		<br/>
	</body>
	</html>