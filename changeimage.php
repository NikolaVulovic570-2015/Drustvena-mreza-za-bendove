<?php
//require('sharewithall2.php');
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$username = $_POST['name'];
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Datoteka nije slika.";
        $uploadOk = 0;
    }

    if($_FILES["fileToUpload"]["tmp_name"] == false ) {
       header("Location:mojprofil.php");
            exit(); 
    } 
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Vaša slika je prevelika. Dozvoljena veličina slike je 5MB.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Samo su JPG, JPEG, PNG & GIF datoteke dozvoljene.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    ?>
    <p><a href="mojprofil.php">Vrati se na profil.</a></p>

    <?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Datoteka ". basename( $_FILES["fileToUpload"]["name"]). " je dodata.";
    } else {
        echo "Pojavila se greška prilikom dodavanja Vaše datoteke.";
    }
	
	$db = mysqli_connect("localhost", "root","","bendovi");
			$imeslike= basename( $_FILES["fileToUpload"]["name"]);
			$sql = "UPDATE users SET slika_ime = '".$imeslike."' WHERE username = '".$username."'";
			mysqli_query($db, $sql);
	mysqli_close($db);
	
	$username = $_POST['name'];
	
	header("Location:mojprofil.php");
            
            exit();
	
	
}
?>