<?php

function __autoload($class_name) {
    include 'classes/' . $class_name . '.php';
}

$beer = new Animal('Winnie', 'male', 100);
$slang = new Animal('Snieky', 'male', 100);
$kat = new Animal('Gizmo', 'female', 100);

$lion1 = new Lion('Simba', 'male', 100, 'congo lion');
$lion2 = new Lion('Scar', 'male', 100, 'kenia lion');

$zebra1 = new Zebra('Zeke', 'male', 100, 'quagga');
$zebra2 = new Zebra('Zana', 'female', 100, 'selous');

$beer->changeHealth(-10);
?>


<html>
<head>
	<title></title>
</head>
<body>
	<h1>Instanties van de animal classe</h1>
	<p><?php echo $beer->getName() ?> is van het geslacht <?php echo $beer->getGender() ?> en heeft momenteel <?php echo $beer->getHealth() ?> health</p>
	<p><?php echo $slang->getName() ?> is van het geslacht <?php echo $slang->getGender() ?> en heeft momenteel <?php echo $slang->getHealth() ?> health</p>
	<p><?php echo $kat->getName() ?> is van het geslacht <?php echo $kat->getGender() ?> en heeft momenteel <?php echo $kat->getHealth() ?> health</p>

	<h1>Instanties van de lion class</h1>
	<p>De speciale move van <?php echo $lion1->getName() ?> (soort: <?php echo $lion1->getSpecies() ?> : <?php echo $lion1->doSpecialMove() ?>)</p>
	<p>De speciale move van <?php echo $lion2->getName() ?> (soort: <?php echo $lion2->getSpecies() ?> : <?php echo $lion2->doSpecialMove() ?>)</p>

	<h1>Instanties van de zebra class</h1>
	<p>De speciale move van <?php echo $zebra1->getName() ?> (soort: <?php echo $zebra1->getSpecies() ?> : <?php echo $zebra1->doSpecialMove() ?>)</p>
	<p>De speciale move van <?php echo $zebra2->getName() ?> (soort: <?php echo $zebra2->getSpecies() ?> : <?php echo $zebra2->doSpecialMove() ?>)</p>

</body>
</html>