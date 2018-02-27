<!DOCTYPE html> 
<html> 
<body> 

<?php
$conn = mysqli_connect("120.119.72.53:8609","root","123456");

if (!$conn){
  die("Could not connect: " . mysqli_connect_error($conn));
}

echo "connect successfully";


$sql = "SELECT ID, light1, light2, light3, light4, light5, light6, light7, light8 FROM led";

if ($result=mysqli_query($conn,$sql))
	
	{
		while ($row = mysqli_fetch_row($result))
		{
			printf ("%s  : %s ",$row[0],$row[1]);
			echo "<br>";
		}
		
		mysqli_free_result($result);
	}
	

mysqli_close($conn);
?>

</body> 
</html>