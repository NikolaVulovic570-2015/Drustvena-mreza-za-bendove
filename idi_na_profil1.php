<html>
<head>
<title>Profil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
.container {
    position: relative;
    width: 300px;
  height: 335px;
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
  
  border-style: solid;
  border-width: 7px;
  border-color: black;
  border-radius: 10px 10px 10px 10px;  
}



.text {
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

div.input-group{
    margin: 0px 0px 0px 0px ;
    
   
}

div.gallery:hover {
    border: 1px solid #777;
}


div.gallery img {
    width: 160px;
    height: 160px;
}

div.desc {
    padding: 1px;
    text-align: center;
	color: white;
	background-color: black;
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
require('sharewithall2.php');



	$username1 = $_POST['imekorisnika'];
		

	//prikazi sve moje bendove
		$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			// 1.
			$qry = "SELECT * FROM users WHERE username = '".$username1."'";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} //greske
			while($row = mysqli_fetch_array($result1))
			{
				
				$slika_ime = $row['slika_ime'];
			}
			
			?>
			<center>
			<div class="container">
            <img src="<?php echo $slika_ime; ?>" alt="Profilna slika" class="image" style="margin: 70px 0px 0px 0px" ><?php echo $username1; ?>	
			</div>
			
		

			<br/><br/><br/>
			
			</center>
			<div class="header">
		<h2>Bendovi korisnika: </h2>
	</div>
	<div class="w3-container w3-text-white w3-content w3-center w3-padding-64" style="max-width:1040px" >
   
		
			<?php
			
			$qry = "SELECT * FROM tabela,users WHERE users.id = tabela.id_vlasnika AND users.username = '".$username1."'";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} //greske
			while($row = mysqli_fetch_array($result1))
			{
				$imebenda = $row['ime'];
				$imeslike = $row['slika'];
				
				?>
				
				<center>
				<form method = "post" action = "idi_na_bendpage1.php" >
					<input type="hidden" name="imebenda" value= "<?php echo $imebenda ?>">
				<div class="gallery">
				
				<button type = "submit" name = "button" class="btn" style="background-color: black; border-color: black; color: white; cursor: pointer;"  >
					<img src="<?php echo $imeslike;?>" alt="Bend"><?php echo " ". $imebenda;?></a>
				</button>
			
				</div>
				</form>
				</center>


				
				
				<?php
			}
			
			mysqli_close($con);
			
			?>
			
</body>
</html>