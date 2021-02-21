<?php if (count($errors4) > 0): ?>
	<div class = "error">
		<?php foreach ($errors4 as $error): ?>
			<p><?php echo $error; ?> </p>
		<?php endforeach ?>
	</div>
<?php endif ?>