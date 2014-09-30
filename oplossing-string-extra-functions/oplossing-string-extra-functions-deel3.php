<?php 
$lettertje = 'e';
$cijfertje = '3';
$langsteWoord = 'zandzeepsodemineralenwatersteenstralen';

$nieuwWoord = str_replace($lettertje, $cijfertje, $langsteWoord)
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing string extra functions: deel 3</title>
	</head>
	<body>
	
		<h1>Oplossing string extra functions: deel 3</h1>

		<p>Het woord zandzeepsodemineralenwatersteenstralen waarin alle  e's vervangen zijn door  3's heeft als resultaat:  <?= $nieuwWoord ?>  </p>
	</body>
</html>