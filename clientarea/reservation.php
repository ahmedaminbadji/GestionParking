<?php 
require_once("../config/db.php");
session_start();
if(isset($_SESSION['user'])){
	$date = date('Y-m-d', time());
	

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RESERVATION</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
   
	
</head>
<body>
   

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DASHBOARD</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Profile</a></li>
      <li class="active"><a href="reservation.php">Reservation</a></li>
	  <li><a href="encours.php">Reservation en cours</a></li>
      <li ><a href="historique.php">Historique de reservations</a></li>
      
    </ul>
	<ul class="nav navbar-nav navbar-right">
        
        <li><a href="logout.php">LOGOUT</a>

        </li>
      </ul>
  </div>
 
</nav>


<div class="container" style="margin-left:13%">
  
	<div class="col-lg-12 well">
	<div class="row">
	<div align='center'><h3>Reserver</h3></div><br>
		<form action="process/process.php" method="post"> 
			<div class="col-sm-12">
				<div class="row">
    				<div class="col-sm-6 form-group"> Car Brand :
    					<input name="carName" type="text" class="form-control" id="carName"  required placeholder="Exemple : Renault .." title="brand">
    				</div>
    				<div class="col-sm-6 form-group"> Car Model :
    					<input name="carModel" type="text" class="form-control" id="carModel"   required placeholder="Exemple : Symbole .."  title="model">
    				</div>
					<div class="col-sm-6 form-group">Immatriculation :
    					<input name="mat" type="text" class="form-control" id="mat"  required placeholder="Exemple : 24-116-94563" title="Matricule">
    				</div>
    				<div class="col-sm-6 form-group">Fidelity Points :    			
                        <input name="points" type="text" class="form-control" readonly id="points"   value="<?php echo $_SESSION['points']; ?>" title="Domaine de travail">
                       <label for="usePoints">use points : </label> <input type="checkbox"  value="true" name="usePoints" id="usePoints" >
                    </div>
					<div class="col-sm-6 form-group">Date :
    					<input name="dateof" type="date" required min="<?php echo $date;?>" class="form-control" id="dateof"   placeholder="<?php echo $_SESSION['email']; ?>" title="Email">
    				</div>
					<div class="col-sm-6 form-group">Heure d'arrivée :
    					<input name="horraire" type="time"  required id="horraire"  class="form-control" placeholder="<?php echo $_SESSION['email']; ?>" title="Email">
    				</div>
					<div class="col-sm-offset-4 col-sm-4 form-group">
						<select class="form-control" required name="select1" id="select1">
						
						</select>
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
<script type="text/javascript" language="javascript" src="../static/js/jquery.js"></script>
<script>
	$(function(){
$("#dateof, #horraire").change(function(){
		
		var val1 = $("#dateof").val();
		var val2 = $("#horraire").val();
	
		if(val1 !== "" && val2!=="" ){
			var result= [];
			
		var sel = document.getElementById('select1');
        $.post("process/checkav.php",{val1: val1,val2: val2})
           .done(function(data){
			
			
				result = eval(data);
				
					
				$('#select1').empty();
				
				for(var i=0;i<result.length;i++){
	
					var opt = document.createElement('option');
					opt.innerHTML = result[i];
					opt.value = result[i];
					sel.appendChild(opt);
				
						}
			});
		}
		
       
			
	  });
	  $("#usePoints").change(function() {
		var points = $("#points").val();
		window.alert(points);
		if(this.checked) {
			
			
			if(points<20){
				window.alert("You don't have enough points you need 20 points");
				this.checked = false;
			}
   			 }
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
