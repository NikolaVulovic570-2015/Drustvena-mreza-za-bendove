<?php 


	$errors2 = array();
	$podaci = array();
	

	
	if (isset($_POST['bio']))
	{
		
		$podaci = $_POST['podaciobendu'];
		$imebenda = $podaci[0];
		//$bio = $_POST['bio'];
		//$disko= $_POST['disko'];
		//$clanovi = $_POST['clanovi'];
		//$linkovi = $_POST['linkovi'];
	

			
			$db = mysqli_connect("localhost", "root","","bendovi");
			
			$qry = "SELECT * FROM tabela WHERE ime = '".$imebenda."'";
			$result1 = mysqli_query($db, $qry);
			if($result1 === FALSE) { die(mysqli_error($db));} // error handling
			while($row = mysqli_fetch_array($result1))
			{
				$bio = $row['biografija'];	
			}
			?>
			
		<div style="margin-left: auto; margin-right: auto; width: 50%">
		<table id="t01">
		<tr>
		<th>Biografija benda</th>
		</tr>
		<tr>
		<td><?php echo $bio; ?></td>
		</tr>
		</table>
		</div>

			
			<?php
			
			mysqli_close($db);
			
			
		
	 header("Location:idi_na_bendpage.php");
		    exit(); 
	}

?>