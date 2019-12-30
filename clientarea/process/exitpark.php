<?php 
include("../../config/db.php");

$user = $_POST['user'];
$ticket = $_POST['ticket'];
$carBrand = $_POST['carBrand'];
$carModel = $_POST['carModel'];
$mat = $_POST['mat'];
$date = $_POST['date'];
$horraire = $_POST['horraire'];
$slot = $_POST['slot'];

$query = "DELETE FROM reserved WHERE ticket='$ticket'";
$query2 = "INSERT INTO `parkingHistory`(`ticket`, `username`, `carBrand`, `carModel`, `matricule`, `dateReserved`, `heurreA`, `slot`) VALUES ('$ticket','$user','$carBrand','$carModel','$mat','$date','$horraire','$slot')";
$query3 = "UPDATE parkingSlots SET reserved = 0 WHERE id ='$slot'";
if(mysqli_query($con,$query) && mysqli_query($con,$query2)&&mysqli_query($con,$query3)){
    echo "done";
}

?>