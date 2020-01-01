<?php 
include("../../config/db.php");

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $query = "DELETE FROM gardiens WHERE id = '$id'";
    if(mysqli_query($con,$query)){
        echo "done";
    }
}

?>