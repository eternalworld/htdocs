<!DOCTYPE html> 
<html> 
<body> 

<?php 
include("test.php");
			
			$sql = "SELECT * FROM led";
			if($stmt = $db->query($sql))
		{
			while($result = mysqli_fetch_object($stmt))
				{
					echo '<p>名字： '.$result->ID.'，學號：'.$result->light1.'</p>';
				}
			}
		?>

</body> 
</html>