<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Registration</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<?php include 'config.php';?>


</head>
<body id="bloodbank">
<div class="loginbox">
<h2>Hospital Registration</h2>

    <form action="hospitaldata.php" method="post" style="alignment: center">
        <div id="radio" style="padding-bottom: 20px">
        <input type="radio" name="source" value="individual" id="individual" onclick="javascript:window.location.href='individual.php'; return false;"  >Individual
        <input type="radio" name="source" value="BB" id="bb" onclick="javascript:window.location.href='bloodbank.php'; return false;" >Blood Bank
        <input type="radio" name="source" value="hospital" id="hosp" onclick="javascript:window.location.href='hospital.php'; return false;" checked>Hospital
            <br/>
        </div>
         
                
        <table width="100%" >
        <div id="add">
		<tr>
		<td colspan="2">
		<label for="bname">Hospital Name</label><br/>
            <input type="text" id="bname" name="hname" placeholder="Enter Hospital Name">
			</td>
			<td colspan="2">
            <label for="lnumber">Licence Number</label><br/>
            <input type="number" id="lnumber" name="hnumber" placeholder="Enter Hospital's Licence Number">
		</td>
		</tr>
            <tr>
                <td colspan="2" width="50%">
                    <label for="email">Email ID</label>
                    <input type="email" placeholder="Enter email id" name="hemail" required>
                </td>
                <td >
                    <label for="Mobile Number">Mobile Number</label>
                    <input type="number" placeholder="Enter Mobile Number" name="hmobile" required>
                </td>
            </tr>
                <tr>
                    <td colspan="2">
            <label for="state" >State</label><br/>
        <select id="state" name="state">
<?php

$state=mysqli_query($conn,"select DISTINCT city_state from citydatabase order by city_state");
while($row=mysqli_fetch_array($state))
{	
?>
<option><?php echo $row["city_state"]; ?></option>
<?php
}
?>	
        </select>
		
		
                        </td>
                  
                    <td colspan="2">
        <label for="city">City</label><br/>
            <select id="city" name="city">
<?php
		$city=mysqli_query($conn,"select DISTINCT city_name from citydatabase order by city_name");
while($row=mysqli_fetch_array($city))
{	
?>
<option><?php echo $row["city_name"]; ?></option>
<?php
}
?>
            </select>
                        </td>
                </tr>
            <tr><td colspan="3">
        <label for="local">Local Address</label><br/>
                <input type="text" id="local" name="hlocal" placeholder="Enter Local Address"></td></tr>
            <tr><td colspan="2">
                <label for="password">Enter Password</label><br/>
                <input type="password" id="password" name="hpassword" placeholder="Enter Password"></td>
            <td>
        <label for="password">Confirm Password</label><br/>
                <input type="password" id="password" name="hcpassword" placeholder="Confirm Password"></td></tr>
        </div></table>
<input type="submit" value="Submit">
    </form>
</body>
</html>