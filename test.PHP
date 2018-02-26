<!DOCTYPE html> 
<html> 
<body> 

<?php
$con = mysqli_connect("120.119.72.53:8609","root","123456");

if (!$con){
  die("Could not connect: " . mysqli_connect_error($con));
}

echo "connect successfully";

		
$sql = "SELECT ID, light1, light2, light3, light4, light5, light6, light7, light8 FROM led";
$result = mysqli_query($con, $sql);


if (mysql_num_rows($result)>0)
{
	while($row = mysql_fetch_assoc($result))
	{
		echo "ID".$row["ID"]. "light1" .$row["light1"]."light2".$row["light2"]..$row["light3"]..$row["light4"]..$row["light5"]..$row["light6"]..$row["light7"]..$row["light8"].;
	}
} else{
echo "0 結果";}

mysqly_close($con);
?>

</body> 
</html>