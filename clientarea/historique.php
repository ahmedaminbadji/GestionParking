<?php
require_once("../config/db.php");
session_start();
$user = $_SESSION['user'];
$query = "SELECT * FROM parkingHistory WHERE username = '$user'";
$result = mysqli_query($con,$query);
    
   
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HISTORIQUE</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
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
	  <li><a href="encours.php">Reservation en cours</a></li>
      <li class="active"><a href="historique.php">Historique de reservations</a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
        
        <li><a href="#">LOGOUT</a>

        </li>
      </ul>
  </div>
 
</nav>
<!--<div class="container">
<div class="table-responsive">
<?php// while(mysqli_num_rows($result)>0){
?>

<?php 
 //}
?>
</div>
</div> -->


      
       <br><br><br>
        <div class="container">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>TICKET</th>
                  <th>CAR BRAND</th>
                  <th>CAR MODEL</th>
                  <th>IMMATRICULATION</th>
                  <th>RESERVED DATE</th>
                  <th>ARRIVING HOUR</th>
                  <th>SLOT</th>                 
                </tr>
              </thead>
             
                   <?php 
				while($row = mysqli_fetch_assoc($result)) {
					?>
              <tbody>
                <tr>
                  <td><?php echo $row["ticket"]  ?></td>
                  <td><?php echo $row["carBrand"] ?></td>
                  <td><?php echo $row["carModel"] ?></td>
                  <td><?php echo $row["matricule"]  ?></td>
                  <td><?php echo $row["dateReserved"] ?></td>
                  <td><?php echo $row["heurreA"] ?></td>
                  <td><?php echo $row["slot"]  ?></td>

                </tr>
              </tbody>
              <?php 
					}
						
				mysqli_free_result($result);
				
			?>
            </table>
            
        </div>
        </div>




</body>
</html>