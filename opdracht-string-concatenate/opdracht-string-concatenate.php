<?php 
	$voornaam = "Steven";
	$familienaam = "Serrien";

	$volledigeNaam = $voornaam . $familienaam;

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>opdracht-string-concatenate</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <h1> Opdracht string concatenate </h1>
        <p>Volledige naam: <?= $volledigeNaam ?>
        	<br>
        	<?= strlen($volledigeNaam) ?>
        </p>
        <script src="js/main.js"></script>
    </body>
</html>