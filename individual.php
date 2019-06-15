
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="formchange.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

		<?php include 'config.php';?>

	<script>
	function passcheck(){
	if document.getElementById('password').value == document.getElementById('cpassword').value
	{
	document.getElementById('msg').style.color = 'green';
	document.getElementById('msg').innerHTML = 'matching';
	}else{
	alert("Password didn't matched");
		}
	}
	</script>
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
	width:100%;
	padding: 12px 20px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
input[type=text],input[type=password],textarea{
	width:100%;
	padding: 12px 20px;
    margin: 8px 0;    
	border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
	input[type=submit] {
background-color: grey;
          color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
			font-size:1vw;
        }
		input[type=mobile]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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
</head>
<body>
<header id="indexheader" >
    <div id="logodiv">
        <h1 id="codered" ><a href="index.php"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
            <a href="index.php"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
        </h1>
        <hr/>
    </div>
    <ul id="ulindex">
        <li class="liindex"><a href="index.php">Home</a></li>
        <li class="liindex"><a href="pbr.php">Post Blood Request</a></li>
    <!--    <li class="liindex"><a href="br.php">Blood Requests</a></li>  -->
        <li class="liindex"><a href="login.php" class="active">Donate Blood</a></li>
        <li class="liindex"><a href="needblood.php"> Need Blood</a></li>
        <li class="liindex"><a href="eligibility.html">Eligibility</a></li>
        <li class="liindex"><a href="contact.html">Contact</a></li>
    </ul>
    <hr>
</header>
<br/>
<br/>
<div class="container">
<h2>User Registration</h2>

    <form action="individualdata.php" method="post" style="alignment: center">
        <div id="radio" style="padding-bottom: 20px">
        <input type="radio" name="source" value="individual" id="individual" onclick="javascript:window.location.href='individual.php'; return false;" checked >Individual
        <input type="radio" name="source" value="BB" id="bb" onclick="javascript:window.location.href='bloodbank.php'; return false;" >Bloodbank / Hospital
            <br/>
        </div>
         
		 
        

<table width="100%">
                <tr>
				<td colspan="3">
            <label for="full name">Full Name</label>
            <input type="text" placeholder="Enter full name" name="fname" required>
                </td>
				<td >
                    <label for="Mobile Number">Mobile Number</label>
                    <input type="mobile" placeholder="Enter Mobile Number" name="mobile" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" required>
                </td>
				<td >
                            <label for="Gender">Gender</label>
                            <select name="gender" id="gender">
                                <option value="Male" >Male</option>
                                <option value="Female" >Female</option>
                                <option value="Other" >Other</option>

                            </select>                        </td>
							
				</tr>


                    <tr>
					<td colspan="2">
                    <label for="email">Email ID</label>
                    <input type="email" placeholder="Enter email id" name="username" required>
                </td>
                        <td >
                            <label for="Blood Group">Blood Group</label>
                        <select name="bgroup" id="bgroup"> 
							<option value="A+" >A+</option>
                            <option value="A-" >A-</option>
                            <option value="B+" >B+</option>
                            <option value="B-" >B-</option>
                            <option value="O+" >O+</option>
                            <option value="O-" >O-</option>
                            <option value="AB+" >AB+</option>
                            <option value="AB-" >AB-</option>
                        </select>
                        </td>
                        <td >
                           <label for="dob">Date Of Birth</label>
            <input type="date" placeholder="Enter Date Of Birth" name="dob" required>
</td>
            <td>
			<label for="Weight">Weight</label>
            <input type="number" placeholder="Enter Weight" name="weight" required>
            </td>
			
                    </tr>

                <tr>
                    <td colspan="3">
            <label for="Select State">Select State</label>
        <select id="state" name="state">
			<option value="select">----Select State----</option>
	
        </select></td>
		<td colspan="3">
        <label for="Select City">Select City</label>
        <select id="city" name="city">
		
            </select></td>
		

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

                </tr>
            <tr><td colspan="6">
        <label for="local">Local Address</label><br/>
                <input type="text" id="local" name="local" placeholder="Enter Local Address"></td></tr>
            <tr><td colspan="3">
                <label for="password">Enter Password</label><br/>
                <input type="password" id="password" name="password" placeholder="Enter Password" onchange='passcheck();'></td>
            <td colspan="3">
        <label for="password">Confirm Password</label><br/>
                <input type="password" id="cpassword" name="confirm_password" placeholder="Confirm Password" onchange='passcheck();'><span id="msg"></span></td>
				</tr>
				<tr>
				<td colspan="6">
                <input type="checkbox" id="checkbox" name="checkbox" required="required">I accept that my contact information from the registration forms is used to get in touch with me in emergency conditions.</td>
        </tr></table><br/><br/>
<input type="submit" value="Submit"  onsubmit="passcheck();">
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
</body>
</html>