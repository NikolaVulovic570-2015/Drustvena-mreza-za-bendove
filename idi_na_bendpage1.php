
<html>
<head>
<title>Bend stranica</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>


.container {
  
    width: 300px;
  height: 360px;
    background-color: black;
    color: white;
    font-size: 20px;
    border-radius: 10px 10px 10px 10px;
}
.container2 {
  
    width: 300px;
  height: 360px;
    background-color: black;
    color: white;
    font-size: 20px;
    border-radius: 10px 10px 10px 10px;
}

.image {
  opacity: 1;
  display: block;
  width: 300px;
  height: 300px;
  transition: .5s ease;
  backface-visibility: hidden;
  border-style: solid;
  border-width: 7px;
  border-color: black;
  border-radius: 10px 10px 10px 10px;  
}
.btn:hover {
	opacity:0.6;
}


.text {
  margin: 0px 0px 0px 30px;
  background-color: black;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

div.gallery {
    margin: 10px;
    border: 1px solid ;
    width: 180px;
    float: left ;
    border-width: 4px;
    border-radius: 10px 10px 10px 10px;
    border-color: black;
   
}



div.gallery img {
    width: 160px;
    height: 160px;
}

.header {
  width: auto;
  margin: 0px auto 0px;
  color: white;
  background: black;
  text-align: center;
  border-bottom: none;
  border-radius: 10px 10px 10px 10px;
  padding: 1px;
}


</style>

</head>
<body>



<?php
//session_start();
require('sharewithall2.php');

	$src = $_POST["imebenda"]; 
	
		$k = 0;
		$podaci_o_bendu = array();
		$albumi = array();
		$pesme = array();
		$clanovi = array();
		$linkovi = array();
		$broji = 0;
		
		
		$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			// 1.
			$qry = "SELECT * FROM tabela";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$ime_benda = $row['ime'];
				$id_vlasnika = $row['id_vlasnika'];
				$grad_benda = $row['grad'];
				$zanr_benda = $row['zanr'];
				$status_benda = $row['status'];
				$godina_benda = $row['godosnivanja'];
				$imeslike = $row['slika'];
				$biografija_benda = $row['biografija'];
				
				
				
				if ($src == $ime_benda){
					$k = 1;
					array_push($podaci_o_bendu,$ime_benda);
					array_push($podaci_o_bendu,$id_vlasnika);
					array_push($podaci_o_bendu,$grad_benda);
					array_push($podaci_o_bendu,$zanr_benda);
					array_push($podaci_o_bendu,$status_benda);
					array_push($podaci_o_bendu,$biografija_benda);
					array_push($podaci_o_bendu,$imeslike);
					array_push($podaci_o_bendu,$godina_benda);
					
					
					}
			}
			
			if($k == 0) {echo "<br/><br/><br/>Bend ne postoji u bazi";}
			else if($k==1) //AKO BEND POSTOJI POKAZI MI NJEGOVU STRANICU:
	{
				//POVEZI SE NA ALBUME I PRIKUPI I TE PODATKE
				$imebb = $podaci_o_bendu[0];
			$qry = "SELECT * FROM albumi,tabela WHERE tabela.ime = albumi.imebenda AND albumi.imebenda = '".$imebb."'";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$ime_albuma = $row['imealbuma'];
				array_push($albumi,$ime_albuma);
			
			}
			
			
			$qry = "SELECT * FROM users WHERE id = '".$podaci_o_bendu[1]."'";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$imevlasnika = $row['username'];
				
			
			}
			
		
			
			
			mysqli_close($con);
			///
			
			
			
			$_SESSION["albumi"] = $albumi;
			
			$_SESSION["brojalbuma"] = count($albumi);
				
			
			
			//sve je prikupljeno, sada pravimo stranicu
			?>
			
		

			
			
			<?php
			if($username != $imevlasnika){
			
			?>
			<form method = "post" action = "idi_na_profil1.php" >
			
			<div class="container2 text" style="margin: 0px 599px 0px 0px; float:right; text-align: left; width: 392; ">

            <h2> <?php echo "Grad: ".$podaci_o_bendu[2];?>  </h2>
            <h2> <?php echo "Žanr: ".$podaci_o_bendu[3];?>  </h2>
            <h2> <?php echo "Status: ".$podaci_o_bendu[4];?>  </h2>
            <h2> <?php echo "Godina osnivanja: ".$podaci_o_bendu[7];?>  </h2>
           <button type = "submit" name = "button" class="btn" style="background-color: black; padding:0px; border-color: black; color: white; position:left;  text-align: left; display: inline-block; cursor: pointer;"  >
			<h2> <?php echo "Bend dodao: ".$imevlasnika;?>  </h2>
			</button>
				

			
			<input type="hidden" name="imekorisnika" value= "<?php echo $imevlasnika ?>">
			
			</form>
            

			</div>
			<div class="container" style="margin: 70px 0px 0px 599px; text-align: center;">
            <img src="<?php echo $podaci_o_bendu[6]; ?>" alt="Profilna slika" class="image" ><?php echo $src; ?>
           
			</div>
				<?php
	}else{
			
			?>
				
			
			<div class="container2 text" style="margin: 0px 599px 0px 0px; float:right; text-align: left; width: 392; ">

            <h2> <?php echo "Grad: ".$podaci_o_bendu[2];?>  </h2>
            <h2> <?php echo "Žanr: ".$podaci_o_bendu[3];?>  </h2>
            <h2> <?php echo "Status: ".$podaci_o_bendu[4];?>  </h2>
            <h2> <?php echo "Godina osnivanja: ".$podaci_o_bendu[7];?></h2>
            
			<h2> <?php echo "Bend dodao: ".$imevlasnika;?>  </h2>
		
			
			</div>
			<div class="container" style="margin: 70px 0px 0px 599px; text-align: center;">
            <img src="<?php echo $podaci_o_bendu[6]; ?>" alt="Profilna slika" class="image" ><?php echo $src; ?>
           
			</div>
			
			
				<?php
	}
			
			?>
			
            
			
					
<center>

<div class="w3-navbar-center">
  
<div class="w3-dropdown-click  w3-black w3-card" >
    <button onclick="myFunction('Demo1')" class="w3-button w3-padding-large w3-black" style="width: 175;">Biografija</button>
    <div id="Demo1" class="w3-dropdown-content w3-bar-block w3-hide ">
      <a class="w3-bar-item " style="width: 717;"><?php

if($podaci_o_bendu[1] == $id){
?>
			<div class= "input-group">
			<form method = "post" action = "izmenipodatke.php" >
			<input type="hidden" name="name" value= "<?php echo $podaci_o_bendu[0]; ?>">
			<button type = "submit" name = "button" class="btn" style= " float:right; font-size: 20px; color:white; background-color:black;border-radius: 10px 10px 10px 10px;border-color: black;cursor: pointer; "><i class="fa fa-pencil"></i> Izmeni biografiju</button>
			</form>
			</div>
		<?php
}
?><?php echo $podaci_o_bendu[5]; ?></a>

	</div>

	
    <button onclick="myFunction('Demo2')" class="w3-button w3-padding-large w3-black" style="width: 175;">Diskografija</button>
	<div id="Demo2" class="w3-dropdown-content w3-bar-block w3-hide ">
    <a class="w3-bar-item " style="width: 717;"><?php

if($podaci_o_bendu[1] == $id){
?>
			<div class= "input-group">
			<form method = "post" action = "izmenidiskografiju.php" >
			<input type="hidden" name="name" value= "<?php echo $podaci_o_bendu[0]; ?>">
			<button type = "submit" name = "button" class="btn" style= " float:right; font-size: 20px; color:white; background-color:black;border-radius: 10px 10px 10px 10px;border-color: black;cursor: pointer; "><i class="fa fa-pencil"></i> Dodaj albume</button>
			</form>
			</div>
		<?php
}
?></a>
	<?php
		$con = mysqli_connect("localhost","root","");
		mysqli_select_db($con,"bendovi");
		
	for($i=0; $i<count($albumi); $i++){
			$tralbum = $albumi[$i];
			$qry = "SELECT * FROM pesme,albumi WHERE albumi.imealbuma = pesme.imealbuma AND albumi.imebenda = '".$imebb."' AND albumi.imealbuma= '".$tralbum."' ";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} // error handling
			?>
				
				<a class="w3-bar-item " style="width: 670; padding: 0px; " ><h2><?php echo $tralbum."<br/>"; ?></h2></a>
				
				
				<?php	
			while($row = mysqli_fetch_array($result1))
			{
				$ime_pesme = $row['imepesme'];
				//array_push($pesme,array($tralbum,$ime_pesme));
				
				?>
				
				<a class="w3-bar-item " style="width: 670; padding: 0px"><?php echo $ime_pesme; ?></a>
				
				
				<?php	
			}
			}
			mysqli_close($con);
	
				?>
	</div>
	
	
	 <button onclick="myFunction('Demo3')" class="w3-button w3-padding-large w3-black" style="width: 175;">Članovi</button>
	<div id="Demo3" class="w3-dropdown-content w3-bar-block w3-hide ">
	<a class="w3-bar-item " style="width: 717;"><?php

if($podaci_o_bendu[1] == $id){
?>
			<div class= "input-group">
			<form method = "post" action = "dodajclana.php" >
			<input type="hidden" name="name" value= "<?php echo $podaci_o_bendu[0]; ?>">
			<button type = "submit" name = "button2" class="btn" style= " float:right; font-size: 20px; color:white; background-color:black;border-radius: 10px 10px 10px 10px;border-color: black;cursor: pointer; "><i class="fa fa-pencil"></i> Dodaj člana</button>
			</form>
			</div>
		<?php
}
?></a>	
	<?php
		$con = mysqli_connect("localhost","root","");
		mysqli_select_db($con,"bendovi");
		
	
			//SADA KAD IMAMO SVE PODATKE O BEDNU I NJEGOVIM ALBUMIMA I PESMAMA PRIKUPI SVE CLANOVE
			$qry = "SELECT * FROM clanovi,tabela WHERE tabela.ime = clanovi.imebenda AND tabela.ime = '".$imebb."'";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$ime_clana = $row['clan'];
			?>
				
			<a class="w3-bar-item " style="width: 692;"><?php echo $ime_clana; ?></a>	
				
			<?php
			
			}
			mysqli_close($con);
	
				?>
	</div>
	
	
	<button onclick="myFunction('Demo4')" class="w3-button w3-padding-large w3-black" style="width: 180;">Linkovi</button>
	<div id="Demo4" class="w3-dropdown-content w3-bar-block w3-hide ">
		<a class="w3-bar-item " style="width: 717;"><?php

if($podaci_o_bendu[1] == $id){
?>
			<div class= "input-group">
			<form method = "post" action = "dodajlink.php" >
			<input type="hidden" name="name" value= "<?php echo $podaci_o_bendu[0]; ?>">
			<button type = "submit" name = "button3" class="btn" style= " float:right; font-size: 20px; color:white; background-color:black;border-radius: 10px 10px 10px 10px;border-color: black;cursor: pointer; "><i class="fa fa-pencil"></i> Dodaj link </button>
			</form>
			</div>
		<?php
}
?></a>	
	<?php
		$con = mysqli_connect("localhost","root","");
		mysqli_select_db($con,"bendovi");
		
	
			
			
			//+LINKOVI
			$qry = "SELECT * FROM linkovi,tabela WHERE tabela.ime = linkovi.imebenda AND tabela.ime = '".$imebb."'";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$link = $row['link'];
				?>
				
				<a href="<?php echo $link; ?> " class="w3-bar-item " style="width: 692;"><?php echo $link; ?> </a>	
				
				<?php
			
			}
			mysqli_close($con);
	
				?>
	</div>
   
	
	

 
</div></div>
</center>



<script>

function myFunction(id) {
var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}


</script>

		<?php
			
		
		
	}
		?>


			
</body>
</html>