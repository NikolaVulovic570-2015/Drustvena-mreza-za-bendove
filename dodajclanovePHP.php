<?php 


	$errors3 = array();
	$clanovi = array();
	

	
	if (isset($_POST['dodaj']))
	{
		$brojkolona = $_POST['brojkolona'];
		$imebenda = $_POST['imebenda'];
		
		for ($i=0; $i<$brojkolona; $i++){
			$ime = $_POST[$i];
			if(empty($ime)){
			array_push($errors3, 'Morate uneti ime clana benda');
			}
			
			array_push($clanovi,$ime);
			
		}
		
		
		
		if(count($errors3)==0){
			
			$db = mysqli_connect("localhost", "root","","bendovi");
			
			for ($i=0; $i<$brojkolona; $i++){
			$ime_temp = $clanovi[$i];
			$sql = "INSERT INTO clanovi(imebenda,clan) VALUES('$imebenda','$ime_temp')";
			mysqli_query($db, $sql);
			}
			
			mysql_close($db);
			
			
			header("Location:mojprofil.php");
		    exit();
			
		}
		
		
	}

?>