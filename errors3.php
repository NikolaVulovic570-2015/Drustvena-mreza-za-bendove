<?php if (count($errors3) > 0): ?>
	<div class = "error">
		<?php foreach ($errors3 as $error): ?>
			<p><?php echo $error; ?> </p>
		<?php endforeach ?>
	</div>
<?php endif ?>