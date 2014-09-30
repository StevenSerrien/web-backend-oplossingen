<?php
$jaartal = 2016;
$isSchrikkel = false;

if (($jaartal % 4 == 0) && ($jaartal % 100 != 0) || ($jaartal % 400 == 0)) {
	$isSchrikkel = true;
}
else {
	$isSchrikkel = false;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing if else: deel1</title>
	</head>
	<body>
		
		<h1>Oplossing if else: deel1</h1>

		<p>Het jaar <?= $jaartal ?> is  <?= $isSchrikkel ? "een" : "geen" ?> schrikkeljaar </p>
	</body>
</html>