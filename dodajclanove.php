<?php
 include('dodajclanovePHP.php');
//require('sharewithall2.php'); 
echo "<br/><br/><br/><br/><br/>"; 


		
		
		$ime = $_POST['imebenda'];
		$kolone = $_POST['kolone'];
					
		?>
				<form method = "post" action = "dodajclanovePHP.php" >
				<div class="header">
				<h2>Dodaj clanove benda</h2>
				</div>
				<?php
					for($i=0; $i<$kolone; $i++)
					{
						
						 ?> <div class= "input-group"><input type = "text" name = "<?php echo $i ?>"></div> <?php 
						
						
						
					}
		
				?>
				<div class= "input-group">
				<button type = "submit" name = "dodaj" class="btn">Dodaj clanove</button>
				</div>
				<input type="hidden" name="username" value= "<?php echo $username ?>">
				<input type="hidden" name="brojkolona" value= "<?php echo $kolone ?>">
				<input type="hidden" name="imebenda" value= "<?php echo $ime ?>">
				</form>
				
				<?php

	