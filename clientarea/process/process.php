<?php 
include("../../config/db.php");
session_start();
if(!empty($_POST['carName']) && !empty($_POST['carModel']) && !empty($_POST['mat']) && !empty($_POST['dateof']) && !empty($_POST['horraire'])){
$id = $_SESSION['id'];
$user = $_SESSION['user'];
$carName = $_POST['carName'];
$carModel = $_POST['carModel'];
$mat = $_POST['mat'];
$dateof = $_POST['dateof'];
$horraire = $_POST['horraire'];
$points = $_POST['points'];
$slot = $_POST['select1'];


if(!empty($_POST['usePoints'])){
    $usePoints = $_POST['usePoints'];
    echo $usePoints;
    if($usePoints =="true"){
        if($points>=20){
            $points=$points-20;
            $query = "UPDATE clients SET fidelityPoints = '$points' WHERE id ='$id'";
            mysqli_query($con,$query);
            $_SESSION['points'] = $points;
        }
    }
}

$query2 = "INSERT INTO reserved (username,carBrand,carModel,immatriculation,heurreA,dateReserved,slot) VALUES('$user','$carName','$carModel','$mat','$horraire','$dateof','$slot')";
mysqli_query($con,$query2);
$query4 = "UPDATE parkingSlots SET reserved = 1 WHERE id = '$slot'";
mysqli_query($con,$query4);
$pointsafter = $_SESSION['points']+5;
$_SESSION['points']= $pointsafter;
$query3 = "UPDATE clients SET fidelityPoints = '$pointsafter' WHERE id ='$id'";
mysqli_query($con,$query3);



header('Location: ../index.php');
}


?>