

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            <a   class="clicky" href="#demandeReservation" >Demande Reservation</a>
            <a   class="clicky" href="#clients" >Clients</a>
            <a   class="clicky" href="#placeLibre" >Place Libre</a>
            <a   class="clicky" href="#gestionGardien" >Gestion des Gardiens</a>
            <a href="deconexion.php" >Deconexion</a>
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
                <h3>0</h3>
            </div>
        
           
        </div>
        <div class="w3-container w3-quarter" style="background-color:#696969;color:#f7f7f7; height:160px;width:160px;margin-left:20px;margin-bottom:20px;">
            <h2>Place Libre</h2>
            
            <div class="w3-right">
                <h3>0</h3>
            </div>
        </div>
        <div class="w3-container w3-quarter" style="background-color:#696969;color:#f7f7f7; height:160px;width:160px;margin-left:20px;margin-bottom:20px;">
            <h2>Clients</h2>
            <br><br>
            <div class="w3-right">
                <h3>0</h3>
            </div>
        </div>
        <div class="w3-container w3-quarter" style="background-color:#696969;color:#f7f7f7; height:160px;width:160px;margin-left:20px;margin-bottom:20px; ">
            <h2>Gardiens</h2>
            <br><br>
            <div class="w3-right">
                <h3>0</h3>
            </div>
        </div>






</body>
</html>

