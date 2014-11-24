<?php
try {

	$message = "";
	$statement;

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

	if (isset($_POST['submit'])) {
		$brnaam = $_POST['brnaam'];
		$postcode = $_POST['postcode'];
		$adres = $_POST['adres'];
		$gemeente = $_POST['gemeente'];
		$omzet = $_POST['omzet'];
	
		$queryString = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
					VALUES (:brnaam, :adres, :postcode, :gemeente, :omzet)';
	
		$statement = $db->prepare($queryString);

		$statement->bindValue(':brnaam', $brnaam);
		$statement->bindValue(':adres', $adres);
		$statement->bindValue(':postcode', $postcode);
		$statement->bindValue(':gemeente', $gemeente);
		$statement->bindValue(':omzet', $omzet);

		$resultaat = $statement->execute();
		$insertedId = $db->lastInsertId();
		if ($resultaat) {
			$message = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $insertedId ;
		}
		else
		{
			$message = 'Er ging iets mis met het toevoegen. Probeer opnieuw.';
		}



	}
	






} catch (Exception $e) {
	echo 'Er ging iets mis: ' . $e->getMessage();
}
	
	
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Opdracht INSERT</title>
		
	</head>
<body>

	<h1>Voeg nieuwe brouwer toe</h1>

	<?php if (!empty($message)) : ?>
	<?php echo $message ?>

	<?php endif ?>

	<form action="opdracht-CRUD-insert.php" method="POST">
		
		<ul>
			<li>
				<label for="brnaam">Brouwernaam</label>
				<input type="text" name="brnaam" id="brnaam">
			</li>
			<li>
				<label for="adres">Adres</label>
				<input type="text" name="adres" id="adres">
			</li>
			<li>
				<label for="postcode">Postcode</label>
				<input type="text" name="postcode" id="postcode">
			</li>
			<li>
				<label for="gemeente">Gemeente</label>
				<input type="text" name="gemeente" id="gemeente">
			</li>
			<li>
				<label for="omzet">Omzet</label>
				<input type="text" name="omzet" id="omzet">
			</li>
		</ul>
		
		<input type="submit" value="Voeg toe" name="submit">
	</form>

</body>
</html>
