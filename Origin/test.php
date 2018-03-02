<?php
require_once 'sqlfunction.php';
$sql = new MemberFunction();

$data = array("123","456",15);
echo $sql->add('persons',$data);
echo $sql->add('myguests',$data);

?>