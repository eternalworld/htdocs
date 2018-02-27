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
$result = mysqli_query($conn, $sql);

if (mysql_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		echo "ID". $row["id"]. " - Name: " . $row["light1"]. " " . $row["light2"]. "<br>";
	}
} 
else{
echo "0 結果";}

mysqli_close($conn);
?>

</body> 
</html>