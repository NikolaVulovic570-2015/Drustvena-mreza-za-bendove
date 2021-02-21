<?php include('dodajlinkphp.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Dodaj link</title>
	<link rel = "stylesheet" type="text/css" href = "style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<?php require('sharewithall2.php'); echo "<br/><br/><br/><br/><br/>";  
if (isset($_POST['button3']))
	{ $imebenda = $_POST['name'];
?>

	<div class="header">
		<h2>Dodaj jedan link</h2>
	</div>
	
	<form method = "post" action = "dodajlink.php" >
	<?php include('errors9.php'); ?>
	    
		
		
		<div class= "input-group">
			<label>Link</label>
			<input type = "text" name = "link">
		</div>
	
		
		<div class= "input-group">
			<button type = "submit" name = "dodaj" class="btn" style="cursor: pointer;">Nastavi dalje</button>
		</div>
		<input type="hidden" name="name" value= "<?php echo $imebenda ?>">
		
		
		
	</form>

<?php }
	
	?>	

</body>
</html>