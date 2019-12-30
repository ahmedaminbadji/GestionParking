<?php 
require_once("../config/db.php");
session_start();
if(isset($_SESSION['user'])){

  $user = $_SESSION['user'];
  $ticket = "none";
  $carBrand = "none";
  $carModel = "none";
  $mat = "none";
  $horraire = "none";
  $date = "none";
  $slot ="none";

  $query = "SELECT * FROM reserved WHERE username = '$user'";
  $result = mysqli_query($con,$query);
  if(mysqli_num_rows($result)==1){
    $row =  mysqli_fetch_assoc($result);
    $ticket = $row['ticket'];
    $carBrand =$row['carBrand'];
    $carModel = $row['carModel'];
    $mat = $row['immatriculation'];
    $horraire = $row['heurreA'];
    $date = $row['dateReserved'];
    $slot= $row['slot'];
  }
  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
   
  
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Dashboard</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Profile</a></li>
      <li ><a href="reservation.php">Reservation</a></li>
	  <li class="active"><a href="encours.php">Reservation en cours</a></li>
      <li ><a href="#">Historique de reservations</a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
        
        <li><a href="#">LOGOUT</a>

        </li>
      </ul>
  </div>
 
</nav>
<div class="container">
<div class="table-responsive">
<table class="table">

  
  
    <tr>
      <th scope="row">Ticket</th>
      <td><?php echo $ticket; ?></td>     
    </tr>
    <tr>
      <th scope="row">Car Brand</th>
      <td id ="carBrand"><?php echo $carBrand; ?></td>
    </tr>
    <tr>
      <th scope="row">Car Model</th>
      <td><?php echo $carModel; ?></td>
    </tr>
    <tr>
      <th scope="row">Immatriculation</th>
      <td><?php echo $mat; ?></td>
    </tr>
    <tr>
      <th scope="row">Heurre d'arrivée</th>
      <td><?php echo $horraire; ?></td>
    </tr>
    <tr>
      <th scope="row">Date de reservation</th>
      <td><?php echo $date; ?></td>
    </tr>
    <tr>
      <th scope="row">Slot de park</th>
      <td><?php echo $slot; ?></td>
    </tr>
  
</table>
</div>
</div>
<div align="center"> <button class="btn btn-success btn-sm" id ="exit">Exit Park</button></div>

<script type="text/javascript" language="javascript" src="../static/js/jquery.js"></script>
<script>
$(function(){
$(document).ready(function(){
    var val = <?php echo json_encode($carBrand); ?>;
    if(val == "none"){
     $("#exit").hide();
    }
			});
  $("#exit").click(function(){
    var ticket = <?php echo json_encode($ticket); ?>;
    var carBrand = <?php echo json_encode($carBrand); ?>;
    var carModel = <?php echo json_encode($carModel); ?>;
    var mat = <?php echo json_encode($mat); ?>;
    var horraire = <?php echo json_encode($horraire); ?>;
    var date = <?php echo json_encode($date); ?>;
    var slot = <?php echo json_encode($slot); ?>;
    var user = <?php echo json_encode($user); ?>;
    

    $.post("process/exitpark.php",{ticket: ticket,carBrand: carBrand,carModel: carModel,mat: mat,horraire: horraire,date: date,slot: slot,user: user})
           .done(function(data){
            window.alert(data);
            if(data=="done"){
              window.alert("Exited , see you next reservation :D");
              window.location.reload();
            }else{
              window.alert("problem");
            }
				
			});
  
  });
	});
</script>
</body>
</html>
<?php 
}else {
echo "<script>window.location.href = '../index.html'; </script>";
}

?>
