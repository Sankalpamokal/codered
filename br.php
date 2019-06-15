<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
			<?php include 'config.php';?>

    <title>Blood Requests</title>
    <link rel="stylesheet" href="styles.css">
	
<style>
body{

}
	table{
	font-family:Comic Sans MS;

	font-size:1.2vw;
	background-color:white;
		border-collapse:collapse;
		margin:auto;
		width:80%;
		border:1px solid black;
		padding:10px;
		}
		th,td{
		text-align:center;
		border:1px solid black;
		padding:20px;
	}
th{
background-color:grey;
}

p.whyneed{
font-family:Comic Sans MS;
}
.rights{
font-family:Comic Sans MS;
}
input[type=date]{
            width: 15%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
			
        }
		 input[type=submit] {
			border-radius:15px;
            background-color: grey;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: black;
        }
		footer {
    clear: both;
    bottom:0px;
}

 </style>
</head>
<body id="indexbody" >
<header id="indexheader">
    <div id="logodiv">
    <h1 id="codered" ><a href="index.php"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
        <a href="index.php"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
    </h1>
        <hr/>
    </div>
    <ul id="ulindex">
        <li class="liindex"><a href="index.php">Home</a></li>
        <li class="liindex"><a href="pbr.php">Post Blood Request</a></li>
        <li class="liindex"><a href="br.php" class="active">Blood Requests</a></li>
        <li class="liindex"><a href="login.php">Donate Blood</a></li>
        <li class="liindex"><a href="needblood.php"> Need Blood</a></li>
        <li class="liindex"><a href="eligibility.html">Eligibility</a></li>
        <li class="liindex"><a href="contact.html">Contact</a></li>
    </ul>
    <hr/>
</header>
<br/>
<br/>





	<div style="font-family:Comic Sans MS;">

<form action=" " method="post">
<center><label for="dob">Search By Date</label>
    <input type="date"  placeholder="Enter Today's Date" name="pbrdob" required="required">
	<input type="submit" value="Show Requests">
</center>
</form>
<h2 style="color:black;font-size:2.5vw;text-align:center;">Blood Requests Posted</h2><br/>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
$pbrdob = $_POST['pbrdob'];
include_once("config.php"); 

$sql = "SELECT pbrname, pbrmobile, pbrbgroup, pbrgender, pbrstate, pbrcity FROM pbr where pbrdob='$pbrdob' order by pbrid desc";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Mobile</th>";
                echo "<th>BGroup</th>";
                echo "<th>Gender</th>";
                echo "<th>State</th>";
                echo "<th>City</th>";

				
            echo "</tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['pbrname'] . "</td>";
                echo "<td>" . $row['pbrmobile'] . "</td>";
                echo "<td>" . $row['pbrbgroup'] . "</td>";
                echo "<td>" . $row['pbrgender'] . "</td>";
                echo "<td>" . $row['pbrstate'] . "</td>";
                echo "<td>" . $row['pbrcity'] . "</td>";
			
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
<br/>
<br/>
<br/>
<br/>
<br/><footer>
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
</div>
</body>
</html>