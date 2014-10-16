<?php 
session_start();

$_SESSION['aanmeldingsgegevens']['adres']['straat'] = $_POST['straat'];
$_SESSION['aanmeldingsgegevens']['adres']['nummer'] = $_POST['nummer'];
$_SESSION['aanmeldingsgegevens']['adres']['gemeente'] = $_POST['gemeente'];
$_SESSION['aanmeldingsgegevens']['adres']['postcode'] = $_POST['postcode'];

$aanmeldingsgegevens = $_SESSION['aanmeldingsgegevens'];




?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Php oefening 021 - deel3</title>

    </head>
    <body>
		
		<h1>Php oefening 021 - deel3</h1>

        <ul>
        <?php foreach ($aanmeldingsgegevens as $key => $array) : ?>

        <?php foreach ($array as $data => $value) : ?>
        <li>
            <?= $data ?> - <=? $value ?> 
        <li>
            
        
        <br />

         <?php endforeach ?>

        <?php endforeach ?>
        
        </ul>

		
    </body>
</html>