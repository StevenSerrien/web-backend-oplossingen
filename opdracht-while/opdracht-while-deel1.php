<?php
$getal = 0;
$getallenReeks = array();
$getallenReeksVoorwaarden = array();

while ($getal <= 100) {
   $getallenReeks[] = $getal;
   ++$getal;

}

$getal = 0;
while ($getal <= 100) {
 if ($getal % 3 == 0 && $getal > 40 && $getal < 80) {
     $getallenReeksVoorwaarden[] = $getal;
 }
 ++$getal;
}


//Waarom lukt dit niet?
/*
while ($getal <= count($getallenReeks)) {
    if (($getallenReeks[$getal] % 3 == 0) && (40 <= $getallenReeks[$getal]) ){
        $getallenReeksVoorwaarden[] = $getallenReeks[$getal];
        
    }
    ++$getal;
}
*/

$getallenReeks = implode(', ', $getallenReeks);
$getallenReeksVoorwaarden = implode(', ', $getallenReeksVoorwaarden);
?>	

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Oplossing while: deel1</title>

    </head>
    <body>
		
		<h1>Oplossing while: deel1</h1>

		<p>Getallenreeks1: <?= $getallenReeks ?></p>
		<p>Getallenreeks2: <?= $getallenReeksVoorwaarden ?></p>

    </body>
</html>


