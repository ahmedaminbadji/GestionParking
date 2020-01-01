<?php 
include("../../config/db.php");

if(!empty($_POST['name'])){
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $mat = $_POST['mat'];
    $salary = $_POST['salary'];

    $query = "INSERT INTO gardiens (`name`, `fname`, `matricule`, `salaire`) VALUES ('$name','$fname','$mat','$salary')";
    if(mysqli_query($con,$query)){
        echo "done";
    }
}

?>