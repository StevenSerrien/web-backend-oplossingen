<?php

$getal = 2;
$dagVanDeWeek ="";

switch($getal)
{
	case 1:
	$dagVanDeWeek = "maandag";
	break;
	case 2:
	$dagVanDeWeek = "dinsdag";
	break;
	case 3:
	$dagVanDeWeek = "woensdag";
	break;
	case 4:
	$dagVanDeWeek = "donderdag";
	break;
	case 5:
	$dagVanDeWeek = "vrijdag";
	break;
	case 6:
	$dagVanDeWeek = "zaterdag";
	break;
	case 7:
	$dagVanDeWeek = "zondag";
	break;
	default:
	break;


}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing switch</title>
	</head>
	<body>
      <h1>Oplossing switch</h1>
		<p>De dag die overeenkomt met het getal "<?= $getal ?>" is: <?= $dagVanDeWeek?></p>
	</body>
</html>