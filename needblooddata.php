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