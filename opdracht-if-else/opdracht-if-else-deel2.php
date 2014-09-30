<?php 


$aantalSeconden = 221108521;

//Seconden in .. 

$minuut = 60;
$uur = 60 * $minuut;
$dag = 24 * $uur;
$week = 7 * $dag;
$maand = 31 * $dag;
$jaar = 12 * $maand;

$aantalMinuten = floor($aantalSeconden/$minuut);
$aantalUren = floor($aantalSeconden/$uur);
$aantalDagen = floor($aantalSeconden/$dag);
$aantalWeken = floor($aantalSeconden/$week);
$aantalMaanden = floor($aantalSeconden/$maand);
$aantalJaren = floor($aantalSeconden/$jaar);
?> 
  
<!DOCTYPE html> 
<html> 
<head> 
    <title>Oplossing if else: deel2</title> 
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head> 
<body> 
  
    <h1>Oplossing if else: deel2</h1> 
  
    <h2>Aantal seconden in een ...</h2> 
  
    <ul> 
        <li>minuut: <?= $minuut?></li> 
        <li>uur: <?= $uur ?></li> 
        <li>dag: <?= $dag?></li> 
        <li>week: <?= $week ?></li> 
        <li>maand (31): <?= $maand ?></li> 
        <li>jaar (365): <?= $jaar?></li> 
    </ul> 
  
    <h1>Aantal ... in <?= $aantalSeconden?> seconden</h1> 
  
    <ul> 
        <li>minuten: <?= $aantalMinuten?></li> 
        <li>uren: <?= $aantalUren?></li> 
        <li>dagen: <?= $aantalDagen?></li> 
        <li>weken: <?=$aantalWeken ?></li> 
        <li>maanden (31): <?= $aantalMaanden?></li> 
        <li>jaren (365): <?= $aantalJaren?></li> 
    </ul> 
  
</body> 
</html>