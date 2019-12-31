<?php 
include("../../config/db.php");

$user = $_POST['user'];
$vals = $_POST['vals'];
if(!empty($vals)){
    
$done = false;

$size = sizeof($vals);
$str ="(";
$str = $str . $vals[0];
for($i=1;$i<$size;$i++){
    $str = $str . "," . $vals[$i];
}
$str = $str . ")";
$query = "SELECT * FROM reserved WHERE ticket IN $str";
$result = mysqli_query($con,$query);
$n=mysqli_num_rows($result);
if($n>0){
    while($row = mysqli_fetch_assoc($result)){
        $ticket = $row['ticket'];
        $user = $row['username'];
        $carBrand = $row['carBrand'];
        $carModel = $row['carModel'];
        $mat = $row['immatriculation'];
        $h = $row['heurreA'];
        $d = $row['dateReserved'];
        $slot = $row['slot'];
        
        if(mysqli_query($con,"INSERT INTO parkingHistory (`ticket`, `username`, `carBrand`, `carModel`, `matricule`, `dateReserved`, `heurreA`, `slot`) VALUES ('$ticket','$user','$carBrand','$carModel','$mat','$d','$h','$slot')") && mysqli_query($con,"DELETE FROM reserved WHERE ticket='$ticket'") && mysqli_query($con,"UPDATE parkingSlots SET reserved = 0 WHERE id ='$slot'") ){
            $done = true;
        }else{
            $done = false;
        }
        
}


}
if($done){
    echo "done";
}
}
?>