<!DOCTYPE HTML>
<html>
<head>
<title>Approve Events</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="styles.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<?php include 'config.php';?>

		
 <style>
 hr{
 margin-top:0px;
 margin-bottom:0px;
 }
        body,html {
            height: 100%;
			background-color: red;
			margin: 0px;
        }
        * {box-sizing: border-box;}
.rights{
font-family:Comic Sans MS;
}

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
		
select {
    width: 15vw;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
input[type=text],textarea{
    width: 25vw;
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
            width:90%;
            font-family:Comic Sans MS;
        }
        h3,h4{
			color:white;
		    font-weight: 500;
            text-align: center;
            font-family:Comic Sans MS;
        }
		table{
		width:100%;
		border:1px solid black;
		padding:10px;
		}
		td{
		text-align:center;
		border:1px solid black;
		padding:20px;
	}
	
	.rights{
font-family:Comic Sans MS;
}
	</style>
	<?php
session_start();
$aemail = $_SESSION['aemail']; //Storing the username value in session variable so that it can be retrieved on other pages
$apassword = $_SESSION['apassword'];
$type = $_SESSION['type'];
$aid = $_SESSION['aid'];
?>
  <?php
 if(!isset($_SESSION['aemail'])) //If user is not logged in then he cannot access the profile page
 {
 //echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
 header("location:alogin.php");
 }
 ?>
	
</head>
<!-- Javascript validation for user inputs -->
<script type="text/javascript">
function validate()
{
var username = document.login.username.value;
var password = document.login.password.value;
if (username==null || username=="")
{
alert("Username can't be blank");
return false;
}
else if (password==null || password=="")
{
alert("password can't be blank");
return false;
}
}
</script>

<body>
<header id="indexheader" style="margin-bottom: 0px;" >
	<div id="logodiv">
		<h1 id="codered" ><a href="index.html"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
			<a href="index.html"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
		</h1>
		<hr/>
	</div>
	<ul id="ulindex" style="padding-top: 8px;padding-bottom: 8px;">
		<li class="liindex"><a href="aprofileedit.php" >Edit Profile</a></li>
		<li class="liindex"><a href="approvebb.php">Approve BBank</a></li>		
		<li class="liindex"><a href="musers.php">Manage Users</a></li>
		<li class="liindex"><a href="pcampaign.php"  class="active">Post Campaign</a></li>
        <li class="liindex"><a href="rusers.php">Reported Users</a></li>
		<li class="liindex"><a href="feedback.php">Feedbacks</a></li>
		<li class="liindex"><a href="logout.php">Logout</a></li>
	</ul>
	<hr/>
</header>

<br/>
<br/>
<div class="container">

  <?php 
include_once("config.php"); 

$sql = "SELECT campid, oname, oemail, ocontact, odate, ocomment FROM camps order by campid desc";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
	        echo "<h2 style=text-align:center;color:black;font-size:2vw;>Approve Events/Campaigns Requests</h2>";

        echo "<table>";
            echo "<tr>";
                echo "<th>Camp Id</th>";
                echo "<th>Organized By</th>";
                echo "<th>Email</th>";
                echo "<th>Contact</th>";
                echo "<th>Event Date</th>";
                echo "<th>Comments</th>";
                echo "<th>Approve Request</th>";
                echo "<th>Remove</th>";
				
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['campid'] . "</td>";
                echo "<td>" . $row['oname'] . "</td>";
                echo "<td>" . $row['oemail'] . "</td>";
                echo "<td>" . $row['ocontact'] . "</td>";
                echo "<td>" . $row['odate'] . "</td>";
                echo "<td>" . $row['ocomment'] . "</td>";
                echo "<td><a style=text-decoration:none; href=approve.php?id=".$row['campid']." target=_blank>Approve</a></td>";			
                echo "<td><a style=text-decoration:none; href=remove.php?id=".$row['campid'].">Remove</a></td>";			
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
?>
		
		</div>
<br/>
<br/>
<br/>
<br/>
<footer>
	<div class="flex-c-m">
		<a href="#" class="loginsocial bg1">
			<i class="fa fa-facebook"></i>
		</a>

		<a href="#" class="loginsocial bg2">
			<i class="fa fa-twitter"></i>
		</a>

		<a href="#" class="loginsocial bg3">
			<i class="fa fa-google"></i>
		</a>
		<a href="#" class="loginsocial bg4">
			<i class="fa fa-instagram"></i>

		</a>
	</div>
		<div class="rights">| Copyright&copy;	codered.com | 2018 | All rights reserved |<br/></div><br/>
</footer>
</body>
</html>