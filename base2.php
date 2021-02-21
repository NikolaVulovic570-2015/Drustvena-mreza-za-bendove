<?php include('server.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Registracija</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<?php require('sharewithall.php'); echo "<br/><br/><br/><br/><br/>"; ?>

	<div class="header">
		<h2>Registruj se</h2>
	</div>
	
	<form method = "post" action = "base2.php">
	<?php include('errors.php'); ?>
		<div class= "input-group">
			<label>Korisničko ime</label>
			<input type = "text" name = "username" value = "<?php echo $username; ?>">
		</div>
		<div class= "input-group">
			<label>Email</label>
			<input type = "email" name = "email" value = "<?php echo $email; ?>">
		</div>
		<div class= "input-group">
			<label>Lozinka</label>
			<input type = "password" name = "password_1">
		</div>
		<div class= "input-group">
			<label>Potvrdi lozinku</label>
			<input type = "password" name = "password_2">
		</div>
		<div class= "input-group">
			<button type = "submit" name = "register" class="btn" style="cursor: pointer;"">Registruj se</button>
		</div>
		
		<p>
			Već si član? <a href="login.php">Uloguj se</a>
		</p>
		
		
	</form>
	

</body>
</html>