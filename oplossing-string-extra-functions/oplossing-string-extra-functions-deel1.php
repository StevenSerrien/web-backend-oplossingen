<?php 

$fruit = 'kokosnoot';
$aantalKarakters = strlen($fruit);
$positieKarakter = strpos("$fruit", "o")
?><!DOCTYPE html>
<html>
	<head>
		<title>Oplossing string extra functions: deel 1</title>
	</head>
	<body>
		<h1>Oplossing string extra functions: deel 1</h1>

		<p>De needle O komt in kokosnoot voor de eerste keer op plaats <?= $positieKarakter + 1?> voor.
			<br> Kokosnoot bevat <?= $aantalKarakters ?> aantal karakters.</p>
	</body>
</html>