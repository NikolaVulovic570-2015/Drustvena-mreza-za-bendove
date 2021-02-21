<html>
<head>
<title>Pretraga po Gradu</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


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

form, .content {
  max-width: 1040px:;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}

form.example button {
    float: right;
    width: 20%;
    padding: 30px;
    background: black;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;

}

form.example button:hover {
    background: grey;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
</style>


</head>
<body>

<?php
require('sharewithall.php');
$gradovi = array();
$bendnames = array();

		
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			$qry = "SELECT DISTINCT grad FROM tabela";
			$result1 = mysqli_query($con, $qry);
			if($result1 === FALSE) { die(mysqli_error($con));} 
			while($row = mysqli_fetch_array($result1))
			{
				$temp = $row['grad'];
				array_push($gradovi,$temp);
				
			}
			mysqli_close($con);
			

			
			$con = mysqli_connect("localhost","root","");
			
			mysqli_select_db($con,"bendovi");
			
			foreach ($gradovi as $clan) {
			
			$qry = "SELECT * FROM tabela WHERE grad LIKE '$clan'";
			$result2 = mysqli_query($con, $qry);
			if($result2 === FALSE) { die(mysqli_error($con));} // greske
				while($rows = mysqli_fetch_array($result2))
				{
				$temp = $rows['ime'];
				
				array_push($bendnames, array($clan,$temp));
				}	
			} 
			
			mysqli_close($con);
					
			
		
		
			
		
?>
<br/><br/>
			<div class="w3-container w3-text-white w3-content w3-center w3-padding-64" style="max-width:1040px;" > 
             <div class="header">
			<h2 class="w3-animate-zoom" style="margin: 20px 0px 20px 0px; text-align: center;">Pretraga benda po gradu</h2>
	
	<?php foreach ($gradovi as $clan) 
	{	
			?>
			
			
			<form method = "post" action = "izbor_po_gradu.php" >
			<input type="hidden" name="clan" value= "<?php echo $clan ?>">
			<button type = "submit" name = "button" class="w3-bar-item w3-button w3-padding-large"  style="background-color: black; color:white;"  >
					<?php echo " ". $clan;?>
			</button>
			</form>
			
			
			
			<?php
	}
			?>
	
 </div>

</body>
</html>