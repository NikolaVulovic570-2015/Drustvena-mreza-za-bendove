<html>
<head>
<title>Naslov</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
<?php 
require('sharewithall2.php');
//session_start();


$albumi = $_SESSION["albumi"];

echo "<br/><br/>";
echo "<br/><br/>";
for ($i=0; $i<=count($albumi)-1; $i++){
	
		//za svaki album:
		
		$trenutni_a = $albumi[$i];
		//echo ime albuma	
			
		?>
			
			<div class="w3-panel w3-amber">
			<h1 class="w3-text-yellow" style="text-shadow:1px 1px 0 #444">
			<b><?php echo $trenutni_a?></b></h1>
			</div>
			
	    <?php
		
		
		$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			// 1.
			$qry = "SELECT imepesme FROM albumi,pesme WHERE pesme.imealbuma = '".$trenutni_a."' AND pesme.imealbuma = albumi.imealbuma";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$ime_pesme = $row['imepesme'];
				
			?>
			
			<div class="w3-panel w3-amber">
			<h2 class="w3-text-yellow" style="text-shadow:1px 1px 0 #444">
			<b><?php echo $ime_pesme?></b></h2>
			</div>
			
			<?php
				//ovde potrebno sredjivanje, ne moze samo echo za dizajn.
				
				
			}
	echo "<br/><br/>";
			
	mysqli_close($con);
		
	
}

	

?>
</body>
</html>
