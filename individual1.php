
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
	<style>
	input[type=submit] {
background-color: white;
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
	</style>
</head>
<body id="bloodbank">

<div class="loginbox">
<h2>User Registration</h2>

    <form action="individualdata.php" method="post" style="alignment: center">
        <div id="radio" style="padding-bottom: 20px">
        <input type="radio" name="source" value="individual" id="individual" onclick="javascript:window.location.href='individual.php'; return false;" checked >Individual
        <input type="radio" name="source" value="BB" id="bb" onclick="javascript:window.location.href='bloodbank.php'; return false;" >Bloodbank / Hospital
            <br/>
        </div>
         
		 
        

        <div id="hideind">
<table width="100%" >
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
            <label for="country" >country</label><br/>
        <select id="country" name="country">

        </select>
		<label for="state" >State</label><br/>
        <select id="state" name="state">

        </select>
		
		
                        </td>
                  
                    <td colspan="3">
        <label for="city">City</label><br/>
            <select id="city" name="city" >

            </select>
                        </td>
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
        </tr></div></table><br/><br/>
<input type="submit" value="Submit"  onsubmit="passcheck();">
    </form>
</body>
</html>