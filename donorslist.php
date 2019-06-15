<?php
include_once("config.php"); 
$state = $_POST["state"];						 	 	
$city =	$_POST["city"];	

$sql = "SELECT indid, fname, username, mobile FROM individual WHERE state='$state' AND city='$city'";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Full_name</th>";
                echo "<th>Email Id</th>";
                echo "<th>Mobile</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['indid'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
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
?>
