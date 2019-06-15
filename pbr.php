<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Post Blood Requests</title>
    <link rel="stylesheet" href="styles.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

			<?php include 'config.php';?>


    <style>
	.rights{
font-family:Comic Sans MS;
}
h2{
font-family:Comic Sans MS;
}
        body {
            margin: 0px;
            background-color: red;
        }
        * {box-sizing: border-box;}

        input[type=text], input[type=email],input[type=date],input[type=number],input[type=mobile], textarea,select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
			
        }

        input[type=submit] {
            background-color: grey;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: black;
        }

        .container {
            border-radius: 22px;
            background-color: #f2f2f2;
            padding: 50px;
            margin-bottom: 50px;
            font-family:Comic Sans MS;
            font-weight: 10%;
    background-color: #f2f2f2 ;
    width:60%;
    margin:auto;
        }
            hr {
    border: 1px solid white;
}

.postbtn {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    background-color: #4CAF50;
            color: white;
            padding: 19px 26px;
            border: none;
            border-radius: 15px;
}

.postbtn:hover {
    opacity: 1;
    
}
td{
text-align:left;
}

@media screen and (max-width:400px){
    #ulindex {
        float:none;
        display:block;
        width:100%;
        text-align:left;
    }
	.container {
    border-radius: 22px;
    background-color: #f2f2f2;
    padding: 50px;
    margin-bottom: 50px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    background-color: #f2f2f2 ;
    width:85%;
    margin:auto;
        }

}
    </style>
</head>
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
        <li class="liindex"><a href="pbr.php"class="active">Post Blood Request</a></li>
   <!--     <li class="liindex"><a href="br.php">Blood Requests</a></li> -->
        <li class="liindex"><a href="login.php">Donate Blood</a></li>
        <li class="liindex"><a href="needblood.php"> Need Blood</a></li>
        <li class="liindex"><a href="eligibility.html">Eligibility</a></li>
        <li class="liindex"><a href="contact.html">Contact</a></li>
    </ul>
    <hr/>
</header>
<br/>
<center><h2><a href="camps.php" target= "_blank" style="color:white;text-decoration:none;">Click Here </a>to add blood donation campaigns/events</h2></center>

  <div class="container">
    <form action="pbrdata.php" method="post">
	
    <h1>Post Blood Request</h1>
    <p><b>Please fill the information to post your blood request,we will inform our donors and we hope needy patient will recover soon!</b></p>
    <hr>
    <table>
        <tr>
    <td colspan="4"><label for="full name">Full Name</label><br/>
    <input type="text" placeholder="Enter full name" name="pbrname" required></td>

   <td colspan="4"> <label for="Mobile Number">Mobile Number</label>
    <input type="mobile"  maxlength="10" minlength="10" pattern="[789][0-9]{9}" placeholder="Enter Mobile Number" name="pbrmobile" required></td>
</tr>
<tr>
<td colspan="4"><label for="email">Email ID</label>
                    <input type="email" placeholder="Enter email id" name="pbremail" required>
	</td>
   <td colspan="2"> <label for="Blood Group">Blood Group</label>
    <select name="pbrbgroup"> <option value="">select</option>
	<option value="A+" >A+</option>
  <option value="A-" >A-</option>
  <option value="B+" >B+</option>
  <option value="B-" >B-</option>
   <option value="O+" >O+</option>
    <option value="O-" >O-</option>
	 <option value="AB+" >AB+</option>
	  <option value="AB-" >AB-</option>
	  </select></td>
	  
  </tr>
  <tr>

    <td colspan="2"><label for="dob">Today's Date</label>
    <input type="date"  placeholder="Enter Today's Date" name="pbrdob" required></td>

    <td colspan="2"><label for="Weight">Weight</label>
    <input type="number" placeholder="Enter Weight" min="1" name="pbrweight" required></td>

    <td colspan="2"><label for="Gender">Gender</label>
    <select name="pbrgender">
                                <option value="Male" >Male</option>
                                <option value="Female" >Female</option>
                                <option value="Other" >Other</option>

                            </select></td>
</tr>
<tr>

            <td colspan="3">
            <label for="Select State">Select State</label>
        <select id="state" name="pbrstate">
			<option>----Select State----</option>
	
        </select></td>
		<td colspan="3">
        <label for="Select City">Select City</label>
        <select id="city" name="pbrcity">
					<option>----Select City----</option>

            </select></td></tr>
		

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

   <td colspan="6"> <label for="Locality">Locality</label>
    <input type="text" placeholder="Enter Locality" name="pbrlocal" required></td>
</tr>
</table>
<br>
<input type="submit" class="postbtn" value="Post Request">
</form>
</div>
<br>
<br>
	<footer style="bottom:0px;">
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
	<div class="rights">| Copyright&copy; codered.com | 2018 | All rights reserved |<br/></div><br/>
</footer>
</body>
</html>
