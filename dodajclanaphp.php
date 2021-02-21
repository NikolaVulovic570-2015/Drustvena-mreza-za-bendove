<?php 


	$errors8 = array();
	

	
	if (isset($_POST['dodaj']))
	{
		
		
		$imeclana = $_POST['imeclana'];
		$imebenda= $_POST['name'];	
		
		if(empty($imeclana)){
			array_push($errors8, 'Morate uneti ime clana');
		}
	
		if(count($errors8)==0){
			
			$db = mysqli_connect("localhost", "root","","bendovi");
			$qry = "INSERT INTO clanovi(imebenda,clan) VALUES('$imebenda','$imeclana')";
			mysqli_query($db, $qry);
			mysqli_close($db);
			
		
			 ?>
			 
		</br></br></br></br></br></br></br></br></br></br></br>
			 <center>
			 <form method = "post" action = "idi_na_bendpage1.php" style="background:transparent; border: transparent; padding: 30px;">
			 	
			<input type="hidden" name="imebenda" value= "<?php echo $imebenda; ?>">
			<button type = "submit" name = "button" class="btn" style= " font-size: 30px; color:white; background-color:black;border-radius: 10px 10px 10px 10px;border-color: black;cursor:pointer; ">Završeno sa izmenama</button>
			</form><br>
			 </center>
			 
			 <?php
			
		}
		
	 
	}

?>