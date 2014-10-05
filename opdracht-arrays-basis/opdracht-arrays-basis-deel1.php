<?php 

$dieren = array('slang', 'koe', 'aap', 'olifant', 'neushoorn', 'beer', 'leeuw', 'slak', 'dolfijn', 'kwal');

$dieren2[] = 'slang';
$dieren2[] = 'koe';
$dieren2[] = 'hond';
$dieren2[] = 'kat';
$dieren2[] = 'schildpad';
$dieren2[] = 'leeuw';
$dieren2[] = 'kameel';
$dieren2[] = 'worm';
$dieren2[] = 'schorpioen';
$dieren2[] = 'kever';

//Multidimensionale arrays

$voertuig['landvoertuigen'] = array('vespa', 'fiets');
$voertuig['watervoertuigen'] = array('surfplank', 'vlot', 'schoener', 'driemaster');
$voertuig['luchtvoertuigen'] = array('luchtballon', 'helicopter', 'B52');



?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing arrays basis: deel1</title>
	</head>
	<body>

      <h1>Oplossing arrays basis: deel1</h1>
      <?= var_dump($voertuig)?>
   
	</body>
</html>