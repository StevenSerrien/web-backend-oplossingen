<?php 


$regularExpression = "";
$replacement = "#";
$searchString = "";
$error = "Er is geen match gevonden.";
$isGeenMatch = true;
$resultaat = false;



if (isset($_GET['submit'])) {

	$regularExpression = $_GET['regularExpression'];
	$searchString = $_GET['searchString'];


	var_dump($searchString);
	$isGeenMatch = preg_match('/' . $regularExpression . '/', $searchString);
	$resultaat = preg_replace('/' . $regularExpression . '/', $replacement, $searchString);

	$resultatenArray[] = $resultaat;


}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht regular expressions</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">

        <style>

        #searchString {
        	width: 400px;
        	height: 75px;
        }


        </style>
    </head>
    <body>
        
       <h1>RegEx Tester</h1>

       <form>
       	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
			
			<ul>
				<li>
					<label for="regularExpression">Regular expression</label>
					<br>
					<input type="text" name="regularExpression" id="regularExpression" value="<?= $regularExpression ?>">
				</li>
				<li>
					<label for="string">String</label>
					<br>
					<input type="text" name="searchString" id="searchString" value="<?= $searchString ?>">
				</li>
			</ul>
			<input type="submit" name="submit" value="Test!">
		</form>

		<?php if ( $resultaat ): ?>
			<p><?= $resultaat ?></p>
		<?php endif ?>
		<?php if ( !($isGeenMatch == 1) ): ?>
			<p><?= $error ?></p>
		<?php endif ?>


		<h2> Resultaten deel 2 </h2>
		<ul>
			<li>[a-du-zA-DU-Z]</li>
			<li>colou?r</li>
			<li>1\d{3}</li>
			<li>\d|[\-\.\/]</li>
		</ul>




       </form>
    </body>
</html>