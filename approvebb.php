<!DOCTYPE HTML>
<html>
<head>
<title>Edit Profile</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="styles.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
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
		<li class="liindex"><a href="approvebb.php" class="active">Approve BBank</a></li>
		<li class="liindex"><a href="musers.php" >Manage Users</a></li>
		<li class="liindex"><a href="pcampaign.php">Post Campaign</a></li>
        <li class="liindex"><a href="rusers.php">Reported Users</a></li>
		<li class="liindex"><a href="feedback.php">Feedbacks</a></li>
		<li class="liindex"><a href="logout.php">Logout</a></li>
	</ul>
	<hr/>
</header>

<br/>
<br/>
<div class="container">
<center><h2 style="font-size:2.5vw;color:black;">Approve Blood Bank</h2></center>
<?php
include_once("config.php"); 

$sql = "SELECT * FROM bloodbank where approve='no' order by bid ";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>DOCUMENT</th>";
                echo "<th>NAME</th>";
                echo "<th>LICENSE</th>";
                echo "<th>EMAIL</th>";
                echo "<th>MOBILE</th>";
                echo "<th>STATE</th>";
                echo "<th>CITY</th>";
                echo "<th>APPROVE</th>";
				
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['bid'] . "</td>";
				echo '<td><center><img src="data:image/jpeg;base64,'.base64_encode($row['bfile'] ).'" width="100" onclick="window.open(this.src)" /> </center></td> ';				 
                echo "<td>" . $row['bname'] . "</td>";
                echo "<td>" . $row['bnumber'] . "</td>";
                echo "<td>" . $row['busername'] . "</td>";
                echo "<td>" . $row['bmobile'] . "</td>";
				
                echo "<td>"; 
$statename=mysqli_query($conn,'select DISTINCT state_name from states where state_id= ' . $row['bstate'] . '');
while($row1=mysqli_fetch_array($statename))
{	
echo $row1["state_name"];
}
 echo "</td>";
                echo "<td>" ; 
				

$cityname=mysqli_query($conn,'select city_name from cities where city_id= ' . $row['bcity'] . '');
while($row2=mysqli_fetch_array($cityname))
{	
echo $row2["city_name"]; 
}
				echo "</td>";
				
                echo "<td><a style=text-decoration:none; href=approvebbdata.php?id=".$row['busername'].">Approve</a></td>";			

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