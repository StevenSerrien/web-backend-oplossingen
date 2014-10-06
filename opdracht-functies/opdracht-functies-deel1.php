<?php 

function berekenSom($getal1, $getal2){
	$uitkomst = $getal1 + $getal2;
	return $uitkomst;
}

function vermeningvuldig($getal1, $getal2){
	$uitkomst = $getal1 * $getal2;
	return $uitkomst;
}

function isEven($getal){
	if ($getal % 2 == 0) {
		return "even";
	}
	else
	{
		return "oneven";
	}
	
}

function bewerkingString($string)
{
	$resultaatArray['uppercase'] = strtoupper($string);
	$resultaatArray['length'] = strlen($string);

	return $resultaatArray;
}

$som = berekenSom(4,5);
$product = vermeningvuldig (4,5);
$pariteit = isEven(11);

$string = 'Vandaag is het sinterklaas';
$stringResultaat = bewerkingString($string);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing functies: deel1</title>
	</head>
	<body>

		<h1>Oplossing functies: deel1</h1>

		<p>De som van 4 en 5 is gelijk aan <?php echo $som ?></p>
		<p>Het product van 4 en 5 is gelijk aan <?php echo $product ?></p>

		
			<p>De pariteit van het getal 11 is <?php echo $pariteit ?></p>
		
		<p>De string <?= $string ?> in hoofdletters <?= $stringResultaat['uppercase'] ?> is <?= $stringResultaat['length'] ?>karakters lang.<p>

		<ul>
					<?php foreach( $stringResultaat as $key => $value ): ?>
			<li><?php echo $key ?>: <?php echo $value ?></li>
		<?php endforeach ?>
				</ul>


	</body>
</html>