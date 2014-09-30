<?php 

$fruit = 'ananas';
$positieKarakter = strrpos("ananas", "a");

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing string extra functions: deel 2</title>
	</head>
	<body>
		
		<h1>Oplossing string extra functions: deel 2</h1>

		<p>De needle a komt in ananas voor de laatste keer op plaats <?= $positieKarakter ?> voor</p>
		<p>Het fruit in hoofdletters: <?= strtoupper($fruit) ?></p>
	</body>
</html>