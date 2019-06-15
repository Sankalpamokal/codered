			<?php include 'config.php';
session_start(); //always start a session in the beginning 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code 
{ 
echo 
"Incorrect username or password"; //
header("location: alogin.php");//You will be sent to Login.php for re-login 

} 
$inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
$inPassword = $_POST["password"]; 
$stmt= $conn->prepare("SELECT aid, type, aemail, apassword FROM admin WHERE aemail = ?"); //Fetching all the records with input credentials
$stmt->bind_param("s", $inUsername); //bind_param() - Binds variables to a prepared statement as parameters. "s" indicates the type of the parameter.
$stmt->execute();
$stmt->bind_result($AidDB, $TypeDB, $AemailDB, $ApasswordDB); // Binding i.e. mapping database results to new variables
//Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
if ($stmt->fetch() && ($inPassword==$ApasswordDB)) 
{
$_SESSION['aemail'] = $AemailDB; //Storing the username value in session variable so that it can be retrieved on other pages
$_SESSION['apassword'] = $ApasswordDB;
$_SESSION['type'] = $TypeDB;
$_SESSION['aid'] = $AidDB;
header("location: aprofileedit.php"); // user will be taken to profile page
}
else
{
	$msg="Invalid username or password";
	echo"<script type='text/javascript'>alert('$msg');</script>";
} 
} 
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="styles.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">

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
.container {
    border-radius: 20px;
    background-color: #f2f2f2;
    padding: 50px;
	margin-bottom: 50px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    width:45%;
    margin:auto;
        }
		
.flex-c-m {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 20px;
}

.rights{
font-family:Comic Sans MS;
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
    width:90%;
        }

}
	</style>
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
		<h1 id="codered" ><a href="index.php"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
			<a href="index.php"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
		</h1>
		<hr/>
	</div>
	<ul id="ulindex" style="padding-top: 8px;padding-bottom: 8px;">
		<li class="liindex"><a href="index.php" >Home</a></li>
		<li class="liindex"><a href="pbr.php">Post Blood Request</a></li>
   <!--     <li class="liindex"><a href="br.php">Blood Requests</a></li> -->
		<li class="liindex"><a href="login.php" class="active">Donate Blood</a></li>
		<li class="liindex"><a href="needblood.php"> Need Blood</a></li>
		<li class="liindex"><a href="eligibility.html">Eligibility</a></li>
		<li class="liindex"><a href="contact.html"  >Contact</a></li>
	</ul>
	<hr/>
</header>
<br/>
<br/>


<div class="limiter" style="margin-top: 0px;">
	<div class="container">
			<form class="login100-form" name="login" method="post" action=" " onsubmit="return validate();" >

					<span class="logintitle">
						Login Here
					</span>
<br/>
<div id="radio" style="padding-bottom: 20px">
        <input type="radio" name="source" value="individual" id="individual" onclick="javascript:window.location.href='login.php'; return false;"  >Individual   
          <input type="radio" name="source" value="BB" id="bb" onclick="javascript:window.location.href='blogin.php'; return false;" >Bloodbank / Hospital
                  <input type="radio" name="source" value="admin" id="admin" onclick="javascript:window.location.href='alogin.php'; return false;" checked>Admin
    <br/>
        </div>

				<div class="inputbox">
					<span class="inputlabel">Username</span>
					<div class="incon">
					<i class="fa fa-user icon"></i>
					<input class="inputarea" type="text" name="username" placeholder="Type your username">
					</div></div>
<br/>
				<div class="inputbox">
					<span class="inputlabel">Password</span>
					<div class="incon">
					<i class="fa fa-key icon"></i>
					<input class="inputarea" type="password" name="password" placeholder="Type your password">
					</div></div><br/>

			<!--	<div class="text-right">
					<a href="forgot.html" class="alink">
						Forgot password?
					</a>
				</div>   -->

				<div class="containerform">
					<div class="loginbtn">
						<div class="loginbgbtn"></div>
						<input type="submit" value="Login" class="loginbtntxt">
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