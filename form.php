<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
include 'config.php';
$fname = $_POST["fname"];							 	 	
$email = $_POST["email"];					 	 	
$password =	$_POST["password"];					 	 	
$dob = $_POST["dob"];						 	 	
$gender	= $_POST["gender"];						 	 	


$sql = "INSERT INTO formdata(fname, email, password, dob, gender)
VALUES('$fname', '$email', '$password', '$dob', '$gender')";

if ($conn->query($sql) === TRUE) 
{
echo "<script type='text/javascript'>alert('Registered Successfully');
window.location='home.html';
</script>";
} else {
echo "<script type='text/javascript'>alert('Email already exists');
window.location='form.php';
</script>";
}
$conn->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
  
<style>

body{
            margin: 0px;
            background-color: red;
            font-family:Comic Sans MS;
}

input[type=submit] {
    width: 25%;
    background-color: grey;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
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
        }
	
label{
	font-size:1.2vw;
}

input[type=text],input[type=password],input[type=email],input[type=date],select{
	width:100%;
	padding: 12px 20px;
    margin: 8px 0;    
	border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
	

</style>
</head>
<body>
<br/>
<br/>
<div class="container">
<h2>User Registration</h2>

    <form action=" " method="post" style="alignment: center">
                  
            <label for="name">Full Name</label>
            <input type="text" placeholder="Enter full name" name="fname" required>   
		  
            <label for="email">Email ID</label>
            <input type="email" placeholder="Enter email id" name="email" required>
										
            <label for="password">Enter Password</label><br/>
            <input type="password" id="password" name="password" placeholder="Enter Password">
								
            <label for="dob">Date Of Birth</label>
            <input type="date" placeholder="Enter Date Of Birth" name="dob" required>
			
			<label for="Gender">Gender</label>
				<select name="gender" id="gender">
                    <option value="Male" >Male</option>
                    <option value="Female" >Female</option>
                    <option value="Other" >Other</option>
				</select>                     

<br/><br/>
<input type="submit" value="Submit">
    </form>
	</div>
	<br/>

</body>
</html>
</body>
</html>


