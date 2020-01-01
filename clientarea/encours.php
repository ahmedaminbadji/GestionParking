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
  $n = mysqli_num_rows($result);
    //$row =  mysqli_fetch_assoc($result);
    //$ticket = $row['ticket'];
    //$carBrand =$row['carBrand'];
    //$carModel = $row['carModel'];
    //$mat = $row['immatriculation'];
    //$horraire = $row['heurreA'];
    //$date = $row['dateReserved'];
    //$slot= $row['slot'];
  //}
  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RESERVATION EN COURS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
   
  
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DASHBOARD</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Profile</a></li>
      <li ><a href="reservation.php">Reservation</a></li>
	  <li class="active"><a href="encours.php">Reservation en cours</a></li>
      <li ><a href="historique.php">Historique de reservations</a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
        
        <li><a href="logout.php">LOGOUT</a>

        </li>
      </ul>
  </div>
 
</nav>
<div class="container">
  <?php 
    if($n>0){
  while($row= mysqli_fetch_assoc($result)){

   ?>
<div class="table-responsive">
<table class="table">

  
  
    <tr>
      <th scope="row">Ticket</th>
      <td><?php echo $row['ticket']; ?></td>     
    </tr>
    <tr>
      <th scope="row">Car Brand</th>
      <td id ="carBrand"><?php echo $row['carBrand']; ?></td>
    </tr>
    <tr>
      <th scope="row">Car Model</th>
      <td><?php echo $row['carModel']; ?></td>
    </tr>
    <tr>
      <th scope="row">Immatriculation</th>
      <td><?php echo $row['immatriculation']; ?></td>
    </tr>
    <tr>
      <th scope="row">Heurre d'arrivée</th>
      <td><?php echo $row['heurreA']; ?></td>
    </tr>
    <tr>
      <th scope="row">Date de reservation</th>
      <td><?php echo $row['dateReserved']; ?></td>
    </tr>
    <tr>
      <th scope="row">Slot de park</th>
      <td><?php echo $row['slot']; ?></td>
    </tr>
  
</table>
<label for="ticketToDelete">Check the car and press exit</label>
<input type="checkbox"  class="form-control" value="<?php echo $row['ticket'];?>" name="myCheckboxes[]" id="ticketToDelete" >
<br> 
</div>

<?php 
  }
  ?>
  <div align="center"> <button class="btn btn-success btn-sm" id="exit">Exit Park</button></div>
  <?php
  }else{
    echo "<h1>No Actual Reservations</h1>";
  }
  ?>
  
</div>


<script type="text/javascript" language="javascript" src="../static/js/jquery.js"></script>
<script>
$(function(){

  $("#exit").click(function(){
    var user = <?php echo json_encode($user); ?>; 
    var myCheckboxes = document.querySelectorAll('input[name="myCheckboxes[]"]:checked');

    var vals = [];

for(var x = 0, l = myCheckboxes.length; x < l;  x++)
{
    vals.push(myCheckboxes[x].value);
}
   

   $.post("process/exitpark.php",{vals: vals,user: user})
         .done(function(data){
         
            if(data=="done"){
              window.alert("Exited , see you next reservation :D");
              window.location.reload();
            }else{
              window.alert("No Reservation is checked to exit ..");
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
