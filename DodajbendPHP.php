<?php 


	$errors2 = array();
	

	
	if (isset($_POST['dodaj']))
	{
		
		
		$ime = $_POST['ime'];
		$grad= $_POST['grad'];
		$zanr = $_POST['zanr'];
		$status = $_POST['status'];
		$godina = $_POST['godina'];
		$bio= $_POST['bio'];
		$username= $_POST['name'];
		
		
		$target_dir = "";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
				}
		}
		/////////
		if (file_exists($target_file)) {
    	echo "Sorry, file already exists.";
   		 $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
   		 echo "Sorry, your file is too large.";
   		 $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
   		 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    		$uploadOk = 0;
		}
/////////
		if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}

		}
			
			
			
		
		if(empty($ime)){
			array_push($errors2, 'Morate uneti ime benda');
		}
		if(empty($grad)){
			array_push($errors2, 'Morate uneti grad benda');
		}
		if(empty($zanr)){
			array_push($errors2, 'Morate uneti zanr benda');
		}
		if(empty($status)){
			array_push($errors2, 'Morate izabrati status benda');
		}
		if(empty($godina)){
			array_push($errors2, 'Morate uneti godinu osnivanja benda');
		}
		if(empty($bio)){
			array_push($errors2, 'Morate izabrati biografiju benda');
		}
		
		
		if(count($errors2)==0){
			
			$db = mysqli_connect("localhost", "root","","bendovi");
			
			$qry = "SELECT * FROM users WHERE username = '".$username."'";
			$result1 = mysqli_query($db, $qry);
			if($result1 === FALSE) { die(mysqli_error($db));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$id = $row['id'];	
			}
			$imeslike= basename( $_FILES["fileToUpload"]["name"]);
			
			//$password = md5($password_1); //encript password before storing in database(security)
			$sql = "INSERT INTO tabela(id_vlasnika,ime,grad,zanr,status,godosnivanja,biografija,slika) VALUES('$id','$ime','$grad','$zanr','$status','$godina','$bio','$imeslike')";
			mysqli_query($db, $sql);
			mysqli_close($db);
			?>
			
			<?php
			
			 header("Location:mojprofil.php");
		     exit();
			
			
		}
		
	 
	}

?>