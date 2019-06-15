<?php include 'config.php';
$mail = $_GET['id'];							 	 		
    
$sql = "SELECT oname,oemail FROM camps WHERE campid=$mail";							 	 		
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['smail']))
    {
$msg = $_POST["msg"];
$headers = 'From: projectcodered2018@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';
$sql1 = "update camps set approve='yes', marquee='$msg' where campid='$mail'";
$result1 = mail($row['oemail'], "Message from Codered admin", "Your event request is live on codered", $headers);
if ($conn->query($sql1) === TRUE) {
echo "<script type='text/javascript'>alert('Event approved successfully');
window.location='pcampaign.php';
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Approve</title>
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
<h4 style="font-size: 2.5vw;color:black;">Make an approval notification</h4>	</center>
<div class="container">
<form action=" " method="post"> 
	<h2>Approve event request of &emsp;<?php echo $row["oname"]; ?></h2>
        <textarea rows="4" cols="50" id="msg" name="msg" placeholder="Make a notification..."></textarea>
		<br/>
		<br/>
 <input type="submit" id="smail" name="smail" value="Approve" style="font-family:Comic Sans MS;" formaction=" "><br/><br/>
	
	</form>		
	</div>
	<br/>
		<br/><br/>
		<br/>
	</body>
	</html>