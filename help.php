<div class="w3-container w3-text-white w3-content w3-center w3-padding-64" style="max-width:500px" id="band">
   
	<h2 class="w3-animate-zoom">Browse Bands - By City</h2>
    <p class="w3-opacity"><i>We love music</i></p>
    <p class="w3-container w3-black w3-section w3-round-xxlarge">
	<?php foreach ($gradovi as $clan) {
			echo "Grad- ".$clan.":	";
			for ($x = 0; $x <= count($bendnames)-1; $x++)
				{
					$bend = $bendnames[$x][1];
					$grad1 = $bendnames[$x][0];
					if($clan == $grad1){
						echo '<a href="platforma.php" class="w3-bar-item w3-button w3-padding-small w3-hide-small">'.$bend.'</a>';
					}
				} echo "<br />";
				
		} ?>
	</p>
 </div>