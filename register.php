<?php 
require_once("config/db.php");
$user = $_POST['usernameR'];
$pass = $_POST['passwordR'];
$name = $_POST['name'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];

if(!empty($_POST['usernameR']) && !empty($_POST['passwordR'])){
   

    
        $query = "INSERT INTO clients (`username`, `password`, `firstName`, `Name`, `fidelityPoints`, `Email`, `phoneNumber`) VALUES ('$user','$pass','$fname','$name','0','$email','$phoneNumber')";
        if(mysqli_query($con,$query)){
            echo "done";
        }
       
       
      
       
       
      
    
}else{
    echo "failed";
}
?>