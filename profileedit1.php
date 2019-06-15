<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="formchange.js"></script>
			<?php include 'config.php';?>
	

</head>
<style>

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
    width: 40%;
    background-color: grey;
    color: white;
    border: none;
    padding: 14px 20px;
    border-radius: 30px;
    cursor: pointer;
    margin-left: 30%;
    margin-right: 50%;
    font-size: 20px;
}

input[type=submit]:hover {
    background-color: black;
}
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>
       window.load=$( document ).ready(function() {
	
	 $.ajax({
                type:'POST',
                url:'countryAjaxData.php',
                success:function(html){
                    $('#country').html(html);
                
                                      }
                   }); 
				   
				    });  
					
					
				   $( document ).ready(function() {
					   
					   $('#country').on('change',function(){//change function on country to display all state 
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                                      }
                   }); 
                      }else{
                           $('#state').html('<option value="">Select country first</option>');
                           $('#city').html('<option value="">Select state first</option>'); 
                           }
    });
    
    $('#state').on('change',function(){//change state to display all city
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                                      }
                   }); 
                    }else{
                          $('#city').html('<option value="">Select state first</option>'); 
                         }
    });
	
	});
	 
				   </script>
 <?php
 session_start();
 $username = $_SESSION['username']; //retrieve the session variable
 $mobile = $_SESSION['mobile'];
 $password = $_SESSION['password'];
 $fname = $_SESSION['fname'];
 $gender = $_SESSION['gender'];
 $bgroup = $_SESSION['bgroup'];
 $dob = $_SESSION['dob'];
 $weight = $_SESSION['weight'];
 $state = $_SESSION['state'];
 $city = $_SESSION['city'];
 $local = $_SESSION['local'];

 ?>
 
  <?php
 if(!isset($_SESSION['username'])) //If user is not logged in then he cannot access the profile page
 {
 //echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
 header("location:login.php");
 }
 ?>

 
<body id="bloodbank">
<div class="loginbox">
<center><h1>Welcome <?php echo $fname ?></h1></center>
<center><p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
<p><label for="file" style="cursor: pointer;">Upload Photo</label></p>
<p><img id="output" width="200" /></p>
</center>
<button type="button" onclick="javascript:window.location.href='logout.php';" style="float:right;margin-left:20px;" >Logout</button><button type="button" onclick="clickEdit()" style="float:right;" >Edit Details</button><br/>
<br/>

<script>

function clickEdit() {
document.getElementById('fname').disabled = false;
document.getElementById('mobile').disabled = false;
document.getElementById('gender').disabled = false;
document.getElementById('bgroup').disabled = false;
document.getElementById('email').disabled = false;
document.getElementById('dob').disabled = false;
document.getElementById('weight').disabled = false;
document.getElementById('state').disabled = false;
document.getElementById('city').disabled = false;
document.getElementById('local').disabled = false;
document.getElementById('file').disabled = false;
document.getElementById('submit').disabled = false;
document.getElementById('confirm_password').disabled = false;
document.getElementById('password').disabled = false;

}
</script>


<script>
var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};

</script>


    <form action="editindividualdata.php" method="post" style="alignment: center">
         
   
        <div id="hideind">
<table width="100%" >
                <tr>
				<td colspan="3">
            <label for="full name">Full Name</label>
            <input type="text" placeholder="Enter full name" name="fname" id="fname" value= "<?php echo $fname ?>" disabled>
                </td>
				<td >
                    <label for="Mobile Number">Mobile Number</label>
                    <input type="number" placeholder="Enter Mobile Number" id="mobile" name="mobile" value="<?php echo $mobile ?>" disabled>
                </td>
				<td >
                            <label for="Gender">Gender</label>
                            <select id="gender" name="gender" value="<?php echo $gender ?>" disabled>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>

                            </select>                        </td>
							
				</tr>


                    <tr>
					<td colspan="2">
                    <label for="email">Email ID</label>
                    <input type="email" placeholder="Enter email id" id="email" name="username" value=<?php echo $username ?> disabled>
                </td>
                        <td >
                            <label for="Blood Group">Blood Group</label>
                        <select id="bgroup" name="bgroup" value="<?php echo $bgroup ?>" disabled> <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-" selected>B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                        </td>
                        <td >
                           <label for="dob">Date Of Birth</label>
            <input type="date" placeholder="Enter Date Of Birth" id="dob" name="dob" value="<?php echo $dob ?>" disabled>
</td>
            <td>
			<label for="Weight">Weight</label>
            <input type="number" placeholder="Enter Weight" id="weight" name="weight" value="<?php echo $weight ?>" disabled>
            </td>
			
                    </tr>

					<tr>
                    <td colspan="3">
            <label for="state" >State</label><br/>
        <select id="state" name="state"  disabled>
		<option value="<?php echo $state ?>" ><?php echo $state ?></option>
	
        </select>
                        </td>
                    
                    <td colspan="3">
        <label for="city">City</label><br/>
            <select id="city" name="city" value=<?php echo $city ?> disabled>
			<option value="<?php echo $city ?>" ><?php echo $city ?></option>

            </select>
                        </td>
                </tr>
            <tr><td colspan="6">
        <label for="local">Local Address</label><br/>
                <input type="text" id="local" name="local" placeholder="Enter Local Address" value="<?php echo $local ?>" disabled></td></tr>
            <tr><td colspan="3">
                <label for="password">Enter Password</label><br/>
                <input type="password" id="password" name="password" placeholder="Enter Password" value="<?php echo $password ?>" disabled></td>
            <td colspan="3">
        <label for="password">Confirm Password</label><br/>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $password ?>" disabled></td>
				</tr>
        </div></table>
<input type="submit" id="submit" value="Update Details" disabled>
    </form>
</body>
</html>