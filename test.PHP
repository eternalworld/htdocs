<?php
require_once '2.php';
$sql = new SQLFunction();

//array(ID,Light 0 ~ 7)
$data = array(20,1,1,1,1,1,1,1,1);
//echo $sql->insert('led',20);
echo json_encode($sql->select('led','*'),true);

//var_dump($sql->select());
//print_r($sql->select('led','*')); 




?>