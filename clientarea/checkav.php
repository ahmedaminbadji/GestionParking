<?php 

$val1 = $_POST['val1'];
$val2 = $_POST['val2'];
$array = ["A12","A14",$val2];
echo json_encode($array);
?>