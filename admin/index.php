<?php 
include("../config/db.php");
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <script>
        function openSlideMenu(){
            
                document.getElementById('menu').style.width = '250px';
                document.getElementById('content').style.marginLeft = '250px';
            
            
        }
        function closeSlideMenu(){
            document.getElementById('menu').style.width = '0px';
            document.getElementById('content').style.marginLeft = '0px';
        }
    </script>
   
  
</head>
<script src="js/main.js"></script>
<div id="content">
        <span class="slide">
            <a style="cursor: pointer;" onclick="openSlideMenu()">
            <i class="fas fa-bars"></i>
            </a>
        </span>
        <div id="menu" class="nav">
            <a  style="cursor: pointer;" class="close" onclick="closeSlideMenu()">
            <i class="fas fa-times"></i>
            </a>
            <a   class="clicky" href="#dashboard">Dashboard</a>
            <a   class="clicky" href="#etat" >Etat Globale</a>
            <a   class="clicky" href="#clients" >Clients</a>
            <a   class="clicky" href="#placeLibre" >Place Libre</a>
            <a   class="clicky" href="#gestionGardien" >Gestion des Gardiens</a>
            <a href="deconexion.php" >Deconnexion</a>
        </div>
        <div id="slider"></div>
        </div>
        
        
        
   


    <div id="dashboard" style="display:none;">

<div class="w3-col m7"  >
<div class="alert alert-success" style="margin-left:50px;background-color:red;padding-top:20px;padding-bottom:20px;">
<strong>
<div align="center">
<i class="fa fa-user fa-fw w3-margin-right"></i> Administrateur</strong>
<br><br>
&nbsp; &nbsp; &nbsp;Bienvenue dans votre espace
<br><br> 
<?php 
$date=date(" d/m/y") ; 
$date1=date("h:i"); echo"Date: &nbsp;";   
echo"$date"; 
echo "<br>" ; 
echo"Heure: &nbsp;";
echo"$date1" ;?>
</div>
</div>
  </div>


  <div id="etat" style="display:none;">
  <br>
        <div class="w3-container w3-quarter" style="background-color:#696969;color:#f7f7f7; height:160px;width:160px;margin-left:20px;margin-bottom:20px;">
            <h2>Place Reservé</h2>
            <div class="w3-right">
                <?php 
                 $query = "SELECT * FROM reserved WHERE 1";
                 $result = mysqli_query($con,$query);
                 $reservedPlaces = mysqli_num_rows($result);
                ?>
                <h3><?php echo $reservedPlaces;?></h3>
            </div>
        
           
        </div>
        <div class="w3-container w3-quarter" style="background-color:#696969;color:#f7f7f7; height:160px;width:160px;margin-left:20px;margin-bottom:20px;">
            <h2>Place Libre</h2>
            
            <div class="w3-right">
            <?php 
                 $query1 = "SELECT * FROM parkingSlots WHERE reserved = 0";
                 $result1 = mysqli_query($con,$query1);
                 $freePlaces = mysqli_num_rows($result1);
                ?>
                <h3><?php echo $freePlaces;?></h3>
            </div>
        </div>
        <div class="w3-container w3-quarter" style="background-color:#696969;color:#f7f7f7; height:160px;width:160px;margin-left:20px;margin-bottom:20px;">
            <h2>Clients</h2>
            <br><br>
            <div class="w3-right">
            <?php 
                 $query2 = "SELECT * FROM clients WHERE 1";
                 $result2 = mysqli_query($con,$query2);
                 $clientsNumber = mysqli_num_rows($result2);
                ?>
                <h3><?php echo $clientsNumber;?></h3>
            </div>
        </div>
        <div class="w3-container w3-quarter" style="background-color:#696969;color:#f7f7f7; height:160px;width:160px;margin-left:20px;margin-bottom:20px; ">
            <h2>Gardiens</h2>
            <br><br>
            <div class="w3-right">
            <?php 
                 $query3 = "SELECT * FROM gardiens WHERE 1";
                 $result3 = mysqli_query($con,$query3);
                 $gardiensNumber = mysqli_num_rows($result3);
                ?>
                <h3><?php echo $gardiensNumber;?></h3>
            </div>
        </div>
        <div id="clients" style="display:none;">
        <?php  
        $query4 = "SELECT * FROM clients WHERE 1";
        $result4= mysqli_query($con,$query4);
        ?>
        <br><br><br>
        <div class="container">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>USERNAME</th>
                  <th>FIRST NAME</th>
                  <th>LAST NAME</th>
                  <th>FIDELITY POINTS</th>
                  <th>EMAIL</th>
                  <th>PHONE NUMBER</th>                 
                </tr>
              </thead>
             
                  
              <tbody>
              <?php 
                   if(mysqli_num_rows($result4)>0){
                       
				while($row = mysqli_fetch_assoc($result4)) {
					?>
                <tr>
                  <td><?php echo $row["id"]  ?></td>
                  <td><?php echo $row["username"] ?></td>
                  <td><?php echo $row["firstName"] ?></td>
                  <td><?php echo $row["Name"]  ?></td>
                  <td><?php echo $row["fidelityPoints"] ?></td>
                  <td><?php echo $row["Email"] ?></td>
                  <td><?php echo $row["phoneNumber"]  ?></td>

                </tr>
                <?php 
					}
						
                }
				
				
			?>
              </tbody>
             
            </table>
            
        </div>
        </div>

        </div>

        <div id="placeLibre" style="display:none;">
            <div class="container">
                <h1>Free Slots : </h1> <br>
            <?php $query5 = "SELECT * FROM parkingSlots WHERE reserved = 0";
                  $result5 = mysqli_query($con,$query5);
                  if(mysqli_num_rows($result5)>0){
                      while($row1 = mysqli_fetch_assoc($result5)){
                          
            ?>
            
            <h2 style="color : red;"><?php echo $row1['id'];?></h2>
            <?php 
            
        }
    }
            ?>            
    </div>
        </div>


        <div></div>




</body>
</html>

