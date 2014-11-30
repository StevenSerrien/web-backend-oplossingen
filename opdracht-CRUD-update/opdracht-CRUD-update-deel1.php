<?php

	$message = '';
	

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');



	
	//DELETE

	if (isset($_POST['delete'])) {
		
		
		$brouwerDeleteId = $_POST['delete'];
		
	}
	
	
	if (isset($_POST['confirm'])) {

	if ($_POST['confirm'] != '') {
		$deleteQuery = 'DELETE FROM brouwers
							WHERE brouwernr = :brouwernr';

		$deleteStatement = $db->prepare($deleteQuery);
		$deleteStatement->bindValue(':brouwernr', $_POST['confirm']);

		$resultaat = $deleteStatement->execute();

		if ($resultaat) {
				$message = "De datarij werd goed verwijderd."  ;
		}
		else
		{
				$message = "De datarij kon niet verwijderd worden. Probeer opnieuw." . $deleteStatement->errorInfo()[2];
		}
		}
		
	
	}

	//CONFIRM EDIT

		if (isset($_POST['confirm-edit'])) {
		

		$updateQuery = 'UPDATE brouwers
						SET brnaam = :brnaam,
						 	adres = :adres,
						 	postcode = :postcode,
						 	gemeente = :gemeente,
						 	omzet = :omzet
						WHERE brouwernr = :brouwernr
						LIMIT 1';

		$statement = $db->prepare($updateQuery);

		
		$statement->bindValue(":brnaam", $_POST['brnaam']);
		$statement->bindValue(":adres", $_POST['adres']);
		$statement->bindValue(":postcode", $_POST['postcode']);
		$statement->bindValue(":gemeente", $_POST['gemeente']);
		$statement->bindValue(":omzet", $_POST['omzet']);
		$statement->bindValue(":brouwernr", $_POST['confirm-edit']);

		$resultaat = $statement->execute();

		if ($resultaat) {
			$message ='Wijziging op record:  ' . $_POST[ 'brnaam' ] . ' is gelukt.';
		}
		else
		{
			$message = 'Update is niet gelukt.'  . $statement->errorInfo()[2];
		}
	}

	//SELECT
	
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
	

	// EDIT
	$brouwerNaam = '';
	if(isset($_POST['edit'])){


		$selectUpdateQuery = 'SELECT *
						FROM brouwers
						WHERE brouwernr = :brouwernr';

		$selectUpdateStatement = $db->prepare($selectUpdateQuery);
		$selectUpdateStatement->bindValue(':brouwernr', $_POST['edit']);
		$selectUpdateStatement->execute();

		$selecteerdeBrouwerGegevens = array();

		while ($row = $selectUpdateStatement->fetch(PDO::FETCH_ASSOC)){

			$selecteerdeBrouwerGegevens[] = $row;
		}
		$selecteerdeBrouwerGegevens['data'] = $selecteerdeBrouwerGegevens;
		



		var_dump($selecteerdeBrouwerGegevens['data'][0]);
		foreach ($brouwersArray as $key => $value) {
			foreach ($value as $brouwer) {
				if ($value['brouwernr'] == $_POST['edit']) {
								 $brouwerNaam = $value['brnaam'];

							}			}
		}
	}


	





?>


<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing oefening 025 - a</title>
		 <style>
     	tbody tr:nth-of-type(odd) {
     		background-color:#FFDADA;
      	}

      	.modal {
      		background-color:#FFDADA;
      	}
		</style>
	</head>
<body>

	<h1>Opdracht CRUD Updatee</h1>


	<?php if (isset($_POST['edit'])) : ?>
	
	<h1>Brouwerij <?= $brouwerNaam ?> - <?= $_POST['edit'] ?> </h1>


	<form action="opdracht-CRUD-update-deel1.php" method="POST">
		
		<ul>
			<?php foreach ($selecteerdeBrouwerGegevens['data'][0] as $kolomNaam => $value): ?>
			<?php if ($kolomNaam != "brouwernr") : ?>
				
			
			<li>	
				<label for="<?= $kolomNaam ?>"><?= $kolomNaam ?></label>
				<input type="text" name="<?= $kolomNaam?>" id="<?= $kolomNaam ?>" value="<?= $value ?>">
				
			</li>
		<?php endif ?>
			<?php endforeach ?>
			
			
		</ul>
		
		<button type="submit" value="<?= $selecteerdeBrouwerGegevens['data'][0]['brouwernr'] ?>" name="confirm-edit"> Wijzigen</button>
	</form>


	<?php endif ?>


	<?php if (isset($_POST['delete'])) : ?>
		
	<form class="modal" action="opdracht-CRUD-update-deel1.php" method="POST">
		<p>Weet u zeker dat u deze wil verwijderen?</p>
		<button type="submit" name="confirm" value="<?= $brouwerDeleteId ?>">
		Ja! 
		</button>

		<button type="submit" name="confirm">
		Neeee!
		</button>

	</form>
	<?php endif ?>

	<?php if (!empty($message)) : ?>
	<?php echo $message ?>

	<?php endif ?>
	<form action="opdracht-CRUD-update-deel1.php" method="POST">
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
						<td>
							<button type="submit" name="edit" value="<?= $value['brouwernr'] ?>"><img src="icon-edit.png" alt="edit"></button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

			
		</table>
	</form>

</body>
</html>