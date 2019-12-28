<?php 
require_once("../config/db.php");
session_start();
if(isset($_SESSION['user'])){


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
      <li ><a href="index.php">Profile</a></li>
      <li class="active"><a href="reservation.php">Reservation</a></li>
      <li ><a href="#">Historique de reservations</a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
        
        <li><a href="#">LOGOUT</a>

        </li>
      </ul>
  </div>
 
</nav>


<div class="container" style="margin-left:13%">
  
	<div class="col-lg-12 well">
	<div class="row">
	<div align='center'><h3>Reserver</h3></div><br>
		<form action="editprofile.php" method="post"> 
			<div class="col-sm-12">
				<div class="row">
    				<div class="col-sm-6 form-group"> Car Brand :
    					<input name="carName" type="text" class="form-control" id="carName"  placeholder="Exemple : Renault .." title="brand">
    				</div>
    				<div class="col-sm-6 form-group"> Car Model :
    					<input name="carModel" type="text" class="form-control" id="carModel"   placeholder="Exemple : Symbole .."  title="model">
    				</div>
					<div class="col-sm-6 form-group">Immatriculation :
    					<input name="mat" type="text" class="form-control" id="mat"   placeholder="Exemple : 24-116-94563" title="Matricule">
    				</div>
    				<div class="col-sm-6 form-group">Fidelity Points :    			
                        <input name="points" type="text" class="form-control" id="points"  readonly placeholder="<?php echo $_SESSION['points']; ?>" title="Domaine de travail">
                       <label for="usePoints">use points : </label> <input type="checkbox" name="usePoints" id="usePoints" >
                    </div>
					<div class="col-sm-6 form-group">Horraire :
    					<input name="email" type="text" class="form-control" id="email"   placeholder="<?php echo $_SESSION['email']; ?>" title="Email">
    				</div>
    						
					<div class="col-sm-6 form-group">duration :
    					<input name="password" type="number" class="form-control" id="duration"   placeholder="Enter duration in Min" title="Duration">
					</div>		
	             </div>
							
	<div align='center'>



  <!-- Boutton -->                                        
                                    <div class="col-md-offset-3 col-md-6" style=" margin-top:20px;">
                                        <button name="creer"   type="submit" class="btn btn-success btn-sm"></i>Pay</button>
                                       
					
                                </div>					</div></div>
				</form> 
				</div>
	</div>
	</div>
	
	
	  
  
    </div>
</div>



</body>
</html>
<?php 
}else {
echo "<script>window.location.href = '../index.html'; </script>";
}

?>
