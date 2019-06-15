<!DOCTYPE HTML>
<html>
<head>
<title>Reported Users</title>
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
.container {
			margin:auto;
            border-radius: 10px;
            background-color: #f2f2f2;
            padding: 40px;
            width:80%;
            font-family:Comic Sans MS;
        }
        h3,h4,h2{
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
		<li class="liindex"><a href="pcampaign.php">Post Campaign</a></li>
        <li class="liindex"><a href="rusers.php" class="active">Reported Users</a></li>
		<li class="liindex"><a href="feedback.php">Feedbacks</a></li>
		<li class="liindex"><a href="logout.php">Logout</a></li>
	</ul>
	<hr/>
</header>
<br/>
<br/>
<div class="container">
<center><h2 style="font-size:2.5vw;color:black;">Reported users</h2></center>
<?php
include_once("config.php"); 

$sql = "SELECT * FROM report order by reportid desc";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Mobile</th>";
                echo "<th>Subject</th>";
                echo "<th>Send Message</th>";
				
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['msg'] . "</td>";
                echo "<td><a style=text-decoration:none; href=fmail.php?id=".$row['username']." target=_blank>Message</a></td>";			

				//echo "<td><a href=info.html>Info </a></td>";

			
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
 
// Close connection
mysqli_close($conn);
?>
</div>
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
		<div class="rights">| Copyright&copy;	 codered.com | 2018 | All rights reserved |<br/></div><br/>
</footer>
</body>
</html>