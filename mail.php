<?php include 'config.php';
$mail = $_GET['id'];							 	 		

$sql = "SELECT fname,username FROM individual WHERE indid=$mail";							 	 		
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['smail']))
    {
$rname = $_POST["rname"];
$remail = $_POST["remail"];
$rmobile = $_POST["rmobile"];
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
	<h1>Hello $row[fname] , There's an emergency of blood in your area,please get in touch with recipient.</h1>
	<h2>$rname required blood pints, Here's their message for you...</h2>
    <p>$msg</p>
	<h2>Contact Details</h2>
	<p>Name $rname</p>
	<p>Email $remail</p>
	<p>Mobile $rmobile</p>
	<p>Please do the needful...</p>
    </body>
    </html>
    ";
$headers = 'From: projectcodered2018@gmail.com' . "\r\n" . 
           'MIME-Version: 1.0' . "\r\n" .
           'Content-Type: text/html; charset=utf-8';
$sql = "INSERT INTO nbsm(rname, remail, rmobile, rmsg)
VALUES('$rname', '$remail', '$rmobile', '$msg')";
$result1 = mail($row['username'], "Request For Blood", $rmsg, $headers);
if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Email Sent Successfully');
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
    margin: 8px 0;    
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
		
		@media screen and (max-width:400px){
  
	.container {
    border-radius: 20px;
    background-color: #f2f2f2;
    padding: 20px;
	margin-bottom: 50px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    width:90%;
        }

}
	</style>
</head>
<body>
<center>
<h4 style="font-size: 2.5vw;color:black;">Send Message to donor</h4>	</center>
<div class="container">
<form action=" " method="post"> 
	<h2>Send message to&emsp;<?php echo $row["fname"]; ?></h2>
	<label for="rname">Name</label><br/>
        <input type="text" id="rname" name="rname" placeholder="Enter Your Name" required><br/>

        <label for="remail">Email</label>
        <input type="email" id="remail" name="remail" placeholder="Enter Your Email" required>

        <label for="rmobile">Mobile</label>
        <input type="mobile" id="rmobile" name="rmobile" pattern="[1-9]{1}[0-9]{9}" placeholder="Enter Your Mobile Number" required>
	<label for="msg">Enter Your Message for donor</label><br/>
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