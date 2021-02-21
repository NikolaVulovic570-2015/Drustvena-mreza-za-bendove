<html>
<head>
<title>Bendovi</title>
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
  transition: .5s ease;
  backface-visibility: hidden;
  border-style: solid;
  border-width: 7px;
  border-color: black;
  border-radius: 10px 10px 10px 10px;  
}


.input-group:hover .btn {
	width: 250px;
	
	transition: .5s ease;
  
  
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
.close-thik:after {
  content: '✖'; 
  color: white;
 
}
body {
    font-size: 20px;
}

</style>
</head>
<body>


<?php
require('sharewithall3.php');
		?>
		
<br/><br/>
		 <div class="w3-container w3-text-white w3-content w3-center w3-padding-64" style="max-width:1040px;" > 
             <div class="header">
			<h2 class="w3-animate-zoom" style="margin: 20px 0px 20px 0px; text-align: center;">Bendovi</h2>
		<?php
		
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			$qry = "SELECT * FROM tabela";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} //greske
			while($row = mysqli_fetch_array($result1))
			{
				$imebenda = $row['ime'];
				$imeslike = $row['slika'];
				?>
				<form method = "post" action = "izbrisiBENDhtml_A.php" >
				<div class="gallery">
					<div class="desc">
						<button type = "submit" name="izbrisi"  class="close-thik" style="background-color: black; border-color: black; cursor: pointer;" ></button>
						<img src="<?php echo $imeslike;?>" alt="Bend"><?php echo " ". $imebenda;?></a>
				<input type="hidden" name="hiddenbend" value= "<?php echo $imebenda ?>">
					
					</div>
				</div>
				</form>
				
				
				
				
			<?php
				//u nizu samo jedinstveni zanrovi
			}
			mysqli_close($con);
			
			
			
		
			
		

	?>
	
 </div>
 
  

</body>
</html>