<?php

	$message = '';
	$order = 'ASC';
	$orderKolom = "bieren.biernr";
	$orderString = '';
	
	try 
	{

	//SELECT

	if (isset($_GET['order_by'])) {
		$explodeArray = explode('-', $_GET['order_by']);

		$orderKolom = $explodeArray[0];
		$order = $explodeArray[1];

		$orderString = 'ORDER BY ' . $orderKolom . ' ' . $order;

		if ($order != 'DESC') {
			$order = 'DESC';
		}
		else
		{
			$order = 'ASC';
		}
		
	}



	

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
	$selectQuery = 'SELECT bieren.biernr, bieren.naam, brouwers.brnaam, soorten.soort, bieren.alcohol
					FROM bieren
					INNER JOIN brouwers
						ON bieren.brouwernr = brouwers.brouwernr
					INNER JOIN soorten
						ON bieren.soortnr = soorten.soortnr '
					. $orderString;

	$selectStatement = $db->prepare($selectQuery);
	
	$selectArray = array();
	$kolomNamen = array();
	$bierenArray = array();
	$isGelukt = $selectStatement->execute();

	if ($isGelukt) {
		while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)) {
			$selectArray[] = $row;
		}

		$bierenArray = $selectArray;

		foreach ($selectArray[0] as $key => $value) {
			$kolomNamen[] = $key;
		}
	} else {
		$message = 'Connectie tot de databank is niet gelukt.';
	}

	
	






	} 
	catch (Exception $e) 
	{
		echo 'Er ging iets mis: ' . $e->getMessage();
	}
	



	
	
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD Order by</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
       <style>

        .order a
		{
		    padding-right:20px;
		    background-repeat:no-repeat;
		    background-position:right;
		}

		.ascending a
		{
		    background-image: url("icon-asc.png");
		}

		.descending a
		{
		    background-image: url("icon-desc.png");
		}

       </style>
    </head>
    <body>
    	<h1> Opdracht CRUD - order by </h1>
        <table>
        	<thead>
        		<tr>
        			<?php foreach ($kolomNamen as $key => $value) : ?>
        				<th class="order <?= ($value == $orderKolom && $order == 'ASC') ? 'descending' : 'ascending' ?>" ><a href="<?= $_SERVER['PHP_SELF'] ?>?order_by=<?=$value?>-<?= $order?>"><?=$value?></a></th>
        			<?php endforeach ?>
        		</tr>
        	</thead>
        	<tbody>
        		<?php foreach ($bierenArray as $key => $value) : ?>
        		<tr>
        			<?php foreach ($value as $bier) : ?>
        				<td><?= $bier ?></td>
        			<?php endforeach ?>
        			
        		</tr>
        		<?php endforeach ?>
        	</tbody>

        </table>
        
    </body>
</html>