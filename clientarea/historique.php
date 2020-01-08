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
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
  
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
        
        <li><a href="logout.php">LOGOUT</a>

        </li>
      </ul>
  </div>
 
</nav>



      
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