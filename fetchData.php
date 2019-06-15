<?php include 'config.php';
$state = $_POST['state'];
if(isset($_POST['state']))
{
$query=$conn->query("'select * from citydatabase where city_state=".$state."")
$rowcount=$query->num_rows;
if($rowcount>0)
{
	while($row=$query->fetch_assoc())
	{
	echo '<option value="'.$row['city_name'].'">'.$row['city_name'].'</option>'
	}
}else{
echo '<option value=""> City not available</option>'
}
}
?>