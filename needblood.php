<!DOCTYPE html>
<html lang="en">
<head>
    <title>Need Blood</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="styles.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
		<?php include 'config.php';?>
	

</head>

    <style>
        body {
            margin: 0px;
            background-color: red;
        }
        * {box-sizing: border-box;}
.rights{
font-family:Comic Sans MS;
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
			font-size:1vw;
        }
		
select {
    width: 15vw;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
input[type=text],textarea{
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	font-size:1vw;
}
label{
	font-size:1.2vw;
}
        input[type=submit]:hover {
            background-color: black;
        }

        .container {
			margin:auto;
            border-radius: 10px;
            background-color: #f2f2f2;
            padding: 40px;
            width:80%;
            font-family:Comic Sans MS;
        }
        h3,h4{
			color:white;
		    font-weight: 500;
            text-align: center;
            font-family:Comic Sans MS;
        }
		table{
		width:100%;
		border:1px solid black;
		padding:10px;
		}
		td{
		text-align:center;
		border:1px solid black;
		padding:20px;
	}
	
	.rights{
font-family:Comic Sans MS;
}

			@media screen and (max-width:400px){
  
	.container {
    border-radius: 20px;
    background-color: #f2f2f2;
    padding: 20px;
    font-family:Comic Sans MS;
    font-weight: 10%;
    width:90%;
        }
		table{
		width:100%;
		border:1px solid black;
		padding:10px;
		}
		td{
		text-align:center;
		border:1px solid black;
		padding:20px;
	}

}
    </style>
<body>
<header id="indexheader">
    <div id="logodiv">
        <h1 id="codered" ><a href="index.php"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
            <a href="index.php"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
        </h1>
        <hr/>
    </div>
    <ul id="ulindex">
        <li class="liindex"><a href="index.php" >Home</a></li>
        <li class="liindex"><a href="pbr.php">Post Blood Request</a></li>
   <!--     <li class="liindex"><a href="br.php">Blood Requests</a></li> -->
        <li class="liindex"><a href="login.php">Donate Blood</a></li>
        <li class="liindex"><a href="needblood.php" class="active"> Need Blood</a></li>
        <li class="liindex"><a href="eligibility.html">Eligibility</a></li>
        <li class="liindex"><a href="contact.html"  >Contact</a></li>
    </ul>
    <hr/>
</header>

<h3 style="font-size: 3.5vw; margin-top: 0px;margin-bottom: 20px;">Need Blood ?</h3>
<h4 style="font-size: 1.8vw;">Search For Donors</h4>
<div class="container">
    <form action="" method="post">
	
        <label for="Select State">Select State</label>
        <select id="state" name="state" required= "required">
			<option value="">----Select State----</option>
	
        </select>
        
        <label for="Select City">Select City</label>
        <select id="city" name="city" required= "required">
					<option value="">----Select City----</option>

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

			
			
                            <label for="Blood Group">Blood Group</label>
                        <select name="bgroup" id="bgroup" required= "required"> 
 						<option value=" " >----Select Blood Group----</option>
							<option value="A+" >A+</option>
                            <option value="A-" >A-</option>
                            <option value="B+" >B+</option>
                            <option value="B-" >B-</option>
                            <option value="O+" >O+</option>
                            <option value="O-" >O-</option>
                            <option value="AB+" >AB+</option>
                            <option value="AB-" >AB-</option>
                        </select>
        <br/>
<br/>

        <input type="submit" id="submit" value="Submit" style="font-family:Comic Sans MS;"><br/><br/>

		<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
include_once("config.php"); 
$state = $_POST["state"];						 	 	
$city =	$_POST["city"];	
$bgroup = $_POST["bgroup"];

$sql = "SELECT indid, fname, gender, dob, bgroup FROM individual WHERE state='$state' AND city='$city' AND bgroup='$bgroup'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
	        echo "<h2 style=text-align:center;color:black;font-size:2vw;>Individual blood Donors</h2>";

        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Full Name</th>";
                echo "<th>B Group</th>";
                echo "<th>Gender</th>";
                echo "<th>BirthDate</th>";
                echo "<th>Send Mail</th>";
                echo "<th>Report if info incorrect</th>";
				
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['indid'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['bgroup'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td><a style=text-decoration:none; href=mail.php?id=".$row['indid']." target=_blank>Send Message</a></td>";			
                echo "<td><a style=text-decoration:none; href=report.php?id=".$row['indid']." target=_blank>Report Donor</a></td>";			
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 $sql1 = "SELECT bid, bname, busername, bmobile, blocal FROM bloodbank WHERE bstate='$state' AND bcity='$city'";

if($result = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result) > 0){
 		        echo "<h2 style=text-align:center;color:black;font-size:2vw;>Nearby Blood Banks</h2>";

        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Blood Bank Name</th>";
                echo "<th>Email Id</th>";
                echo "<th>Contact No</th>";
                echo "<th>Address</th>";
				
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['bid'] . "</td>";
                echo "<td>" . $row['bname'] . "</td>";
                echo "<td>" . $row['busername'] . "</td>";
                echo "<td>" . $row['bmobile'] . "</td>";
                echo "<td>" . $row['blocal'] . "</td>";
			
            echo "</tr>";
        }
        echo "</table>";
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
// Close connection
mysqli_close($conn);
}
?>
<br/>
<br/>
<hr style="border:1px solid black;"/>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
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
		<div class="rights">| Copyright&copy;	 codered.com | 2018 | All rights reserved |<br/></div><br/>
</footer>
</body>
</html>
