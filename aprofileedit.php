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
	
.rights{
font-family:Comic Sans MS;
}



footer {
    left: 0;
	padding-top:30px;
    bottom: 50px;
    width: 100%;
    background-color: black;
    color: white;
    text-align: center;
}

.flex-c-m {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 20px;
}
	@font-face {
			font-family: Poppins-Regular;
			src: url('fonts/poppins/Poppins-Regular.ttf');
		}

		@font-face {
			font-family: Poppins-Medium;
			src: url('fonts/poppins/Poppins-Medium.ttf');
		}

		@font-face {
			font-family: Poppins-Bold;
			src: url('fonts/poppins/Poppins-Bold.ttf');
		}

		@font-face {
			font-family: Poppins-SemiBold;
			src: url('fonts/poppins/Poppins-SemiBold.ttf');
		}
		* {
			margin: 0px;
			box-sizing: border-box;
		}
		body, html {
			height: 100%;
			background-color: red;
			margin: 0px;
			

		}
		a.alink {
			font-family: Poppins-Regular,sans-serif;
			font-size: 14px;
			line-height: 1.7;
			color: #666666;
			margin: 0px;
			text-decoration: none;
					}


		a:hover {
			text-decoration: none;
			color:black;
		}

		input {
			outline: none;
			border: none;
		}


		

		button:hover {
			cursor: pointer;
		}

		.txt1 {
			font-family: Poppins-Regular,sans-serif;
			font-size: 14px;
			line-height: 1.5;
			color: #666666;
		}

		.txt2 {
			font-family: Poppins-Regular,sans-serif;
			font-size: 14px;
			line-height: 1.5;
			color: #333333;
			text-transform: uppercase;
		}

		.bg1 {background-color: #3b5998;text-decoration: none;}
		.bg2 {background-color: #1da1f2;text-decoration: none;}
		.bg3 {background-color: #ea4335;text-decoration: none;}


		.container {
	border-radius: 20px;
    background-color: #f2f2f2;
    padding: 20px;
	margin-bottom: 50px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    width:40%;
		}
	


		.logintitle {
			display: block;
			font-family: Poppins-Bold,sans-serif;
			font-size: 39px;
			color: #333333;
			line-height: 1.2;
			text-align: center;
		}
		.inputbox {
			width: 100%;
			position: relative;
			border-bottom: 2px solid #d9d9d9;
		}

		.inputlabel, #radio {
			font-family: Poppins-Regular,sans-serif;
			font-size: 16px;
			color: #333333;
			line-height: 1.5;
			padding-left: 7px;
		}

		.inputarea {
			font-family: Poppins-Regular,sans-serif;
			font-size: 16px;
			color: #333333;
			line-height: 1.2;

			display: block;
			width: 100%;
			height: 55px;
			background: transparent;
			padding: 0 7px 0 43px;
		}
		.containerform {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.loginbtn {
			width: 50%;
			display: block;
			position: relative;
			z-index: 1;
			border-radius: 25px;
			overflow: hidden;
			margin: 0 auto;
		}

		.loginbgbtn {
			position: absolute;
			z-index: -1;
			width: 300%;
			height: 100%;
			top: 0;
			left: -100%;
			transition: all 0.4s;
			background-color:grey;
		}
	input[type=submit]{
		background-color:darkgray;
		}
input[type=submit]:hover{
					background-color:black;
					color:white;
					cursor:pointer;
}
		.loginbtntxt {
			font-family: Poppins-Medium,sans-serif;
			font-size: 16px;
			line-height: 1.2;
			text-transform: uppercase;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 0 20px;
			width: 100%;
			height: 50px;
		}


		.txt1 ,txt2{text-align: center;}
		.text-right {text-align: right;}




		.flex-c-m {
			display: flex;
			justify-content: center;
			align-items: center;
		}


		.flex-col-c {
			display: flex;
			flex-direction: column;
			align-items: center;
		}


		.icon {
			color: black;
			min-width: 50px;
			position: absolute;
			margin-top: 20px;
			margin-left: 18px;
		}
.incon{
			width: 100%;
			margin-bottom: 0px;
	 }

.limiter{
	display: flex;
	justify-content: center;
	align-items: center;
	width: 100%;
}

@media screen and (max-width:400px){

    #ulindex {
        float:none;
        display:block;
        width:100%;
        text-align:left;
    }
	.container {
    border-radius: 20px;
    background-color: #f2f2f2;
    padding: 20px;
	margin-bottom: 50px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    width:85%;
        }

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
		<li class="liindex"><a href="aprofileedit.php" class="active">Edit Profile</a></li>
		<li class="liindex"><a href="approvebb.php">Approve BBank</a></li>
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
<div class="limiter" style="margin-top: 0px;">
	<div class="container">
			<form class="login100-form" name="login" method="post" action="aprofileeditdata.php" onsubmit="return validate();" >

					<span class="logintitle">
						Welcome, <?php echo $type ?>
					</span>

<br/>

				<div class="inputbox">
					<span class="inputlabel">Username</span>
					<div class="incon">
					<i class="fa fa-user icon"></i>
					<input class="inputarea" type="text" name="username" value="<?php echo $aemail ?>" placeholder="Type your username">
					</div></div>
<br/>
				<div class="inputbox">
					<span class="inputlabel">Password</span>
					<div class="incon">
					<i class="fa fa-key icon"></i>
					<input class="inputarea" type="password" name="password" value="<?php echo $apassword ?>" placeholder="Type your password">
					</div></div><br/>

			<!--	<div class="text-right">
					<a href="forgot.html" class="alink">
						Forgot password?
					</a>
				</div>   -->

				<div class="containerform">
					<div class="loginbtn">
						<div class="loginbgbtn"></div>
						<input type="submit" value="Update" class="loginbtntxt">
					</div>
				</div>


<br/>
			
			</form>
	</div>
</div>
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