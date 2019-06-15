<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Need Blood</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="styles.css">
	<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

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
    </style>
	
	
	
	<script>
	<?php include('include/db_connect.php'); ?>

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
				   
				   
<body>
<header id="indexheader">
    <div id="logodiv">
        <h1 id="codered" ><a href="index.html"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
            <a href="index.php"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
        </h1>
        <hr/>
    </div>
    <ul id="ulindex">
        <li class="liindex"><a href="index.php" >Home</a></li>
        <li class="liindex"><a href="pbr.php">Post Blood Request</a></li>
        <li class="liindex"><a href="br.php">Blood Requests</a></li>
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
    <form action="needblooddata.php" method="post">
        <label for="Select country">Select Country</label>
        <select id="country" name="country">
			<option value="select">----Select Country----</option>


        </select>
		<label for="Select State">Select State</label>
        <select id="state" name="state">
			<option value="select">----Select State----</option>


        </select>
        
        <label for="Select City">Select City</label>
        <select id="city" name="city">
			<option value="select">----Select City----</option>

            </select>
                            <label for="Blood Group">Blood Group</label>
                        <select name="bgroup" id="bgroup"> 
 						<option value="select">----Select Blood Group----</option>
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
    </form>
	
<?php include('config.php'); 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
$state = $_POST["state"];						 	 	
$city =	$_POST["city"];	
$bgroup = $_POST["bgroup"];

$sql = "SELECT indid, fname, username, mobile, bgroup FROM individual WHERE state='$state' AND city='$city' AND bgroup='$bgroup'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
	        echo "<h2 style=text-align:center;color:black;font-size:2vw;>Individual blood Donors</h2>";

        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Full_name</th>";
                echo "<th>Email Id</th>";
                echo "<th>Mobile</th>";
                echo "<th>B Group</th>";
				
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['indid'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['bgroup'] . "</td>";
			
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
 		        echo "<h2 style=text-align:center;color:black;font-size:2vw;>Nearby Blood Banks</h2>";

if($result = mysqli_query($conn, $sql1)){
    if(mysqli_num_rows($result) > 0){

        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Bank Name</th>";
                echo "<th>Email Id</th>";
                echo "<th>Mobile</th>";
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
	
</div>
<br/>
<br/>
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
