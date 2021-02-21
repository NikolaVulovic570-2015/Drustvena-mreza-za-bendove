<?php 


	$errors9 = array();
	

	
	if (isset($_POST['dodaj']))
	{
		
		
		$link = $_POST['link'];
		$imebenda= $_POST['name'];	
		
		if(empty($link)){
			array_push($errors9, 'Morate uneti link');
		}
	
		if(count($errors9)==0){
			
			$db = mysqli_connect("localhost", "root","","bendovi");
			$qry = "INSERT INTO linkovi(imebenda,link) VALUES('$imebenda','$link')";
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