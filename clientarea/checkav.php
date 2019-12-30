<?php 
include_once("../config/db.php");
if(isset($_POST['val1'])&& isset($_POST['val2'])){
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];
    $array = [];
    $query ="SELECT * FROM parkingSlots WHERE reserved = 0";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){
        while($row =mysqli_fetch_assoc($result)){
            array_push($array,$row['id']);
        }
    }
    echo json_encode($array);
}

?>