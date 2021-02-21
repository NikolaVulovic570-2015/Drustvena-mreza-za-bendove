<?php include('DodajbendPHP.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Dodaj bend</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<?php require('sharewithall2.php'); echo "<br/><br/><br/><br/><br/>";  ?>

	<div class="header">
		<h2>Dodaj bend</h2>
	</div>
	
	<form method = "post" action = "Dodajbend.php" enctype="multipart/form-data">
	<?php include('errors2.php'); ?>
	    
		<div class="form-control" > 
                <label>Profilna slika benda:</label>
 
                <input type="file"  name="fileToUpload" id="fileToUpload" placeholder="Photo"  required="" capture>
        </div>
		
		<div class= "input-group">
			<label>Ime benda</label>
			<input type = "text" name = "ime">
		</div>
		<div class= "input-group">
			<label>Grad</label>
			<input type = "text" name = "grad" >
		</div>
		<div class= "input-group">
			<label>Žanr</label>
			<input type = "text" name = "zanr">
		</div>
		<div class= "input-group">
			<label>Godina osnivanja</label>
			<input type = "text" name = "godina">
		</div>
		<div class= "input-group">
			<label>Biografija</label>
			<input type = "text" name = "bio">
		</div>
		<div class= "input-group">
			<label>Status</label>
			<select name="status" style="cursor: pointer;">
				<option value="aktivan">Aktivan
				<option value="neaktivan">Neaktivan
			</select>
		<input type="hidden" name="name" value= "<?php echo $username ?>">
		
		
		<div class= "input-group">
			<button type = "submit" name = "dodaj" class="btn" style="cursor: pointer;">Dodaj bend</button>
		</div>
		
		
		
	</form>

	

</body>
</html>