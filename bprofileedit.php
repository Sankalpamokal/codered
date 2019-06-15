<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bloodbank/Hospital Profile</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="formchange.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
		<?php include 'config.php';?>
	

</head>
<style>
.rights{
font-family:Comic Sans MS;
}
 body {
            margin: 0px;
            background-color: red;
        }
    img{
        border-radius: 50%;
}
button{
width: 20%;
    padding: 10px 15px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
	background-color:grey;
    border-radius: 4px;
    box-sizing: border-box;
}
button:hover{
color:white;
background-color:black;
    cursor: pointer;

}

input[type=submit] {
    width: 30%;
    background-color: grey;
    color: white;
    border: none;
    padding: 14px 20px;
    border-radius: 30px;
    cursor: pointer;
    margin-left: 35%;
    margin-right: 35%;
    font-size: 20px;
}

input[type=submit]:hover {
    background-color: black;
}

.container {
			margin:auto;
            border-radius: 10px;
            background-color: #f2f2f2;
            padding: 40px;
            width:50%;
            font-family:Comic Sans MS;
        }
	
label{
	font-size:1.2vw;
}
	select {
    margin: 8px 0;
	width:100%;
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
input[type=text],input[type=password],textarea{
    margin: 8px 0;
	width:100%;
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
</style>
 <?php
 session_start();
 $busername = $_SESSION['busername']; //retrieve the session variable
 $bnumber = $_SESSION['bnumber'];
 $bpassword = $_SESSION['bpassword'];
 $bmobile = $_SESSION['bmobile'];
 $bname = $_SESSION['bname'];
 $state = $_SESSION['bstate'];
 $city = $_SESSION['bcity'];
 $blocal = $_SESSION['blocal'];


 ?>
 
  <?php
 if(!isset($_SESSION['busername'])) //If user is not logged in then he cannot access the profile page
 {
 //echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
 header("location:blogin.php");
 }
 ?>

 
<body>
<header id="indexheader" >
    <div id="logodiv">
        <h1 id="codered" ><a href="index.html"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
            <a href="index.html"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
        </h1>
        <hr/>
    </div>
    <ul id="ulindex">
        <li class="liindex"><a href="index.php">Home</a></li>
        <li class="liindex"><a href="pbr.php">Post Blood Request</a></li>
        <li class="liindex"><a href="br.php">Blood Requests</a></li>
        <li class="liindex"><a href="login.php" class="active">Donate Blood</a></li>
        <li class="liindex"><a href="needblood.php"> Need Blood</a></li>
        <li class="liindex"><a href="eligibility.html">Eligibility</a></li>
        <li class="liindex"><a href="contact.html">Contact</a></li>
    </ul>
    <hr>
</header>
<br/>
<div class="container">
<center><h1>Welcome, <?php echo $bnumber ?></h1></center>
<button type="button" onclick="javascript:window.location.href='logout.php';" style="float:right;" >Logout</button><button type="button" onclick="clickEdit()" style="float:right;" >Edit Details</button><br/>
<br/>

<script>

function clickEdit() {
document.getElementById('bname').disabled = false;
document.getElementById('bnumber').disabled = false;
document.getElementById('bmobile').disabled = false;
document.getElementById('busername').disabled = false;
document.getElementById('state').disabled = false;
document.getElementById('city').disabled = false;
document.getElementById('blocal').disabled = false;
document.getElementById('bcpassword').disabled = false;
document.getElementById('bpassword').disabled = false;
document.getElementById('submit').disabled = false;
}
</script>


    <form action="editbloodbankdata.php" method="post" style="alignment: center">
          
     <table width="100%" >
		<tr>
		<td colspan="2">
		<label for="bname">Bloodbank / Hospital Name</label><br/>
            <input type="text" id="bname" name="bname" placeholder="Enter Bloodbank/Hospital Name" value="<?php echo $bname ?>" disabled required>
			</td>
			<td colspan="2">
            <label for="lnumber">Licence Number</label><br/>
            <input type="text" id="bnumber" name="bnumber" placeholder="Enter Bloodbank's/Hospital's Licence Number" value="<?php echo $bnumber ?>" disabled >
		</td>
		</tr>
            <tr>
                <td colspan="2" width="50%">
                    <label for="email">Email ID  <span style="color:red;font-size:1vw;">(email can't be changed)</span></label>
                    <input type="email" placeholder="Enter email id" id="busername" name="busername" value="<?php echo $busername ?>" disabled required> 
                </td>
                <td >
                    <label for="Mobile Number">Contact Number</label>
                    <input type="number" placeholder="Enter Contact Number" id="bmobile" name="bmobile" required value="<?php echo $bmobile ?>" disabled >
                </td>
            </tr>
                <tr>
                    <td colspan="2">
            <label for="state" >State</label><br/>
        <select id="state" name="state"  disabled>
<?php

$statename=mysqli_query($conn,"select DISTINCT state_name from states where state_id=$state");
while($row=mysqli_fetch_array($statename))
{	
?>
<option value="<?php echo $state ?>" ><?php echo $row["state_name"]; ?></option>
<?php
}
?>	


	
        </select>
                        </td>
                    
                    <td colspan="2">
        <label for="city">City</label><br/>
            <select id="city" name="city" value=<?php echo $city ?> disabled>
<?php

$cityname=mysqli_query($conn,"select DISTINCT city_name from cities where city_id=$city");
while($row=mysqli_fetch_array($cityname))
{	
?>
<option value="<?php echo $city ?>" ><?php echo $row["city_name"]; ?></option>
<?php
}
?>
            </select>
			
			
			
<script type="text/javascript">
$(document).ready(function(){ 
 
  $('#state').change(function(){
    loadCity($(this).find(':selected').val())
  })
});
function loadState(){
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=state"
            }).done(function( result ) { 
                    $("#state").append($(result));  
            });
}

function loadCity(stateId){
        $("#city").children().remove()
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: "get=city&stateId=" + stateId
            }).done(function( result ) {
                
                    $("#city").append($(result));
                
            });
}
// init the countries
loadState();
</script>
                        </td>
                </tr>
            <tr><td colspan="3">
        <label for="local">Local Address</label><br/>
                <input type="text" id="blocal" name="blocal" placeholder="Enter Local Address" required value="<?php echo $blocal ?>" disabled></td>
            <tr><td colspan="2">
                <label for="password">Enter Password</label><br/>
                <input type="password" id="bpassword" name="bpassword" placeholder="Enter Password" required value="<?php echo $bpassword ?>" disabled></td>
            <td>
        <label for="password">Confirm Password</label><br/>
                <input type="password" id="bcpassword" name="bcpassword" placeholder="Confirm Password" required value="<?php echo $bpassword ?>" disabled></td></tr>
        <!--<tr><td colspan="4"><label for="fileupload">Upload ID    </label><input type="file" name="bfile" id="fileupload"></td>
</tr> -->
</table><br/>
		<input type="submit" id="submit" value="Update Details" disabled>
    </form>
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
		<div class="rights">| Copyright&copy;	 codered.com | 2018 | All rights reserved |<br/></div><br/>
</footer>
</body>
</html>
