<?php 
    require_once("../../config/db.php");
    session_start();
    $id = $_SESSION['id'];
    
    if($_POST['name'] !== ""){
        $name = $_POST['name'];
    }else{
        $name = $_SESSION['name'];
    }
   
        
      
        
    
      
    
    if($_POST['num']!== ""){
        $num = $_POST['num'];
    }else{
        $num = $_SESSION['number'];
    } 
    if($_POST['fname']!== ""){
        $fname = $_POST['fname'];
    }else{
        $fname = $_SESSION['fname'];
    } 
    if($_POST['email']!== ""){
        $email = $_POST['email'];
    }else{
        $email = $_SESSION['email'];
    }
   
    $query = "UPDATE clients SET name='$name' , firstName='$fname' , phoneNumber='$num' , Email='$email'  WHERE id='$id'";
    
   
    if(mysqli_query($con,$query)){
        $_SESSION['name']=$name;
        $_SESSION['fname']=$fname;
        $_SESSION['number']=$num;
        $_SESSION['email']=$email;
      
    }else{
        
    }
    $password = $_POST['password'];
    if($password !== ""){
        $query = "UPDATE clients SET password='$password' WHERE id='$id'";
        mysqli_query($con,$query);
    }
    

    header('Location: index.php');

?>