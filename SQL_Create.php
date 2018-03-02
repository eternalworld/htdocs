<!DOCTYPE html>
<html>
<body>

<?php

$servername = "120.119.72.53:8609";
$username = "root";
$password = "123456";
$dbname = "led";

$con = mysqli_connect($servername,$username,$password,$dbname);

// 檢查連結
if (!$con) {
    die("連結失敗: " . mysqli_connect_error());
}

echo "Connect Sucessfully <br>";


$sql = "CREATE TABLE monitor (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
slave VARCHAR(30) NOT NULL,
program VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($con, $sql)) {
	
	echo "Sucess";
}else{
	
	echo "Error ".mysqli_error($con);
}


mysqli_close($con);

?>



</body>
</html>