<?php 
$dieren = array("aap", "slang", "neushoorn", "olifant", "kameel", "hond");
$aantalDieren = count($dieren);

$teZoekenDier = "slang";
$antwoord="";

if (in_array($teZoekenDier, $dieren)) {
	$antwoord = "gevonden.";
}
else {
	$antwoord = "niet gevonden.";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing array functies</title>
	</head>
	<body>

		<h1>Oplossing array functies</h1>
		
		
		<p>In de array met dieren zitten er in totaal <?php echo $aantalDieren ?> dieren</p>

					<p>Het dier <?php echo $teZoekenDier ?> is <?= $antwoord ?> </p>
				
	</body>
</html>