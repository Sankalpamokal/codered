<!DOCTYPE HTML>
<html>
<head>
<title>Post Events</title>
<!-- Using external stylesheet to make the registration form look attractive -->
<link rel = "stylesheet" type = "text/css" href="styles.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<?php include 'config.php';?>

		
 <style>
 body {
            margin: 0px;
            background-color: red;
        } 
 hr{
 margin-top:0px;
 margin-bottom:0px;
 }		
 footer {
    clear: both;
    bottom:0px;
}
.container {
    border-radius: 20px;
    background-color: #f2f2f2;
    padding: 20px;
	margin-bottom: 50px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    width:40%;
    margin:auto;
        }
		.incamp{
		width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
        }
		input[type=submit]:hover {
            background-color: black;
        }
		@media screen and (max-width:400px)
{
    .container {
        width:85%;
    }
}
</style>
 
</head>

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
		<li class="liindex"><a href="pbr.php" class="active">Events/Camps</a></li>
        <li class="liindex"><a href="br.php">Blood Requests</a></li>
		<li class="liindex"><a href="login.php">Donate Blood</a></li>
		<li class="liindex"><a href="needblood.php"> Need Blood</a></li>
		<li class="liindex"><a href="eligibility.html">Eligibility</a></li>
		<li class="liindex"><a href="contact.html"  >Contact</a></li>
	</ul>
	<hr/>
</header>
<br/>
<br/>
  <div class="container">
      <center><h2>Enter Event Details...</h2></center>
	  <form action="campsdata.php" method="post">
	  <label>Organized By</label>
            <input type="text" class="incamp" placeholder="Enter Organizer's Name" name="oname" required="required">
      <label>Email ID</label>
            <input type="text" class="incamp"placeholder="Enter Organizer's Email" name="oemail" required="required">
      <label>Contact</label>
            <input type="text" class="incamp" placeholder="Enter Contact Details" name="ocontact" required="required">
      <label>Date</label>
            <input type="date" class="incamp" placeholder="Enter Date of Event" name="odate" required="required">
      <label>Additional Comments</label>
            <textarea class="incamp" placeholder="Enter additional details like location, rewards,etc" name="ocomment" required="required"></textarea>
      <input type="submit" id="submit" value="Submit" style="font-family:Comic Sans MS;"><br/><br/>
      </form>                          
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
		<div class="rights">| Copyright&copy;	 codered.com | 2018 | All rights reserved |<br/></div><br/>
</footer>
</body>
</html>

