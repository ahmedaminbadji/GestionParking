<?php 
require_once("config/db.php");
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];
$sel1 = $_POST['sel1'];
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['sel1'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $type = $_POST['sel1'];

    if($sel1 =="admin"){
        $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
       
        $result = mysqli_query($con,$query);
        $n = mysqli_num_rows($result);
        if($n==1){
            $_SESSION['role']="admin";
            echo "logged admin";
        }
    }else{
        $query = "SELECT * FROM clients WHERE username = '$user' AND password = '$pass'";
        $result = mysqli_query($con,$query);
        $n = mysqli_num_rows($result);
        if($n>0){
            $row= mysqli_fetch_assoc($result);
            $_SESSION['role']="client";
            $_SESSION['user']=$user;
            $_SESSION['name']=$row['Name'];
            $_SESSION['fname']=$row['firstName'];
            $_SESSION['number']=$row['phoneNumber'];
            $_SESSION['points']=$row['fidelityPoints'];
            $_SESSION['email']=$row['Email'];

            echo "logged client";
        }
    }
}else{
    echo "failed";
}
?>