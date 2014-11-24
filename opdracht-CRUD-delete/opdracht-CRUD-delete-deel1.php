<?php

	$message = '';

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
	
	$selectQuery = 'SELECT *
					FROM brouwers';

	$selectStatement = $db->prepare($selectQuery);
	$selectStatement->execute();

	$brouwersArray = array();

	while ($row = $selectStatement->fetch(PDO::FETCH_ASSOC)) {
		$brouwersArray[] = $row;
	}

	$kolomNamen = array();

	foreach ($brouwersArray[0] as $key => $value) {
		$kolomNamen[] = $key;
	}
	var_dump($kolomNamen);
	//DELETE

	if (isset($_POST['delete'])) {
		

		$deleteQuery = 'DELETE FROM brouwers
						WHERE brouwernr = :brouwernr';

		$deleteStatement = $db->prepare($deleteQuery);
		$deleteStatement->bindValue(':brouwernr', $_POST['delete']);

		$resultaat = $deleteStatement->execute();

		if ($resultaat) {
			$message = "De datarij werd goed verwijderd."  ;
		}
		else
		{
			$message = "De datarij kon niet verwijderd worden. Probeer opnieuw." . $deleteStatement->errorInfo()[2];
		}
	}
	
var_dump($_POST['delete']);

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing oefening 025 - a</title>
		 <style>
     	tbody tr:nth-of-type(odd) {
     	background-color:#FFDADA;
      	}
		</style>
	</head>
<body>

	<h1>Opdracht CRUD Delete</h1>

	<?php if (!empty($message)) : ?>
	<?php echo $message ?>

	<?php endif ?>
	<form action="opdracht-CRUD-delete-deel1.php" method="POST">
		<table>
			<thead>
				<tr>
					<?php foreach ($kolomNamen as $value): ?>
						<th><?= $value ?></th>
					<?php endforeach ?>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($brouwersArray as $key => $value): ?>
					<tr>
						<?php foreach ($value as $brouwer): ?>
							<td><?= $brouwer ?></td>
						<?php endforeach ?>
						<td>
							<button type="submit" name="delete" value="<?= $value['brouwernr'] ?>"><img src="icon-delete.png" alt="delete"></button>
							
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

			
		</table>
	</form>

</body>
</html>