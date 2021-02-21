<html>
<head>
<title>Pretraga bendova abecedno</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

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


div.gallery {
    margin: 10px;
    border: 1px solid ;
    width: 180px;
    float: left ;
    border-width: 4px;
    border-radius: 10px 10px 10px 10px;
    border-color: black;
   
}


div.gallery:hover {
    border: 1px solid #777;
}


div.gallery img {
    width: 160px;
    height: 160px;
}

.text {
  background-color: black;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
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
require('sharewithall.php');
$bendnames = array();

		
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			$qry = "SELECT * FROM tabela";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} //greske
			while($row = mysqli_fetch_array($result1))
			{
				$temp = $row['ime'];
				$slika_temp = $row['slika'];
				array_push($bendnames,$temp);
				array_push($bendnames,$slika_temp);
				//u nizu samo jedinstveni zanrovi
			}
			mysqli_close($con);
			
			sort($bendnames);
			
			
			
		
?>
<br/><br/><br/>
				<div class="w3-container w3-text-white w3-content w3-center w3-padding-64" style="max-width:1040px;" > 
             <div class="header">
			<h2 class="w3-animate-zoom" style="margin: 29px 0px 20px 0px; text-align: center;">Pretraga bendova abecedno</h2>
	<?php foreach ($bendnames as $clan) 
			{
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			$qry = "SELECT * FROM tabela WHERE ime = '".$clan."'";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} //greske
			while($row = mysqli_fetch_array($result1))
			{
				$imeslike = $row['slika'];
				$imebenda = $row['ime'];
				
				
				?>
						
				
				<form method = "post" action = "idi_na_bendpage.php" >
					<input type="hidden" name="imebenda" value= "<?php echo $imebenda ?>">
					
				<div class="gallery">
				<button type = "submit" name = "button" class="btn" style="background-color: black; border-color: black; color: white; cursor: pointer;"  >
					<img src="<?php echo $imeslike;?>" alt="Bend"><?php echo " ". $imebenda;?></a>
				</button>
			    </div>
				</form>
				
			
				<?php
			}
			mysqli_close($con);
			} 
	?>
	</p>
 </div>
 
  

</body>
</html>