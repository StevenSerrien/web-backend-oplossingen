<?php 

session_start();

if (isset($_POST['submit'])) {

    $_SESSION['aanmeldingsgegevens']['data']['nickname'] = $_POST['nickname'];
    $_SESSION['aanmeldingsgegevens']['data']['email'] = $_POST['email'];
    
}

$aanmeldingsgegevens['data'] = $_SESSION['aanmeldingsgegevens']['data'];

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Php oefening 021 - deel2</title>

    </head>
    <body>
		
        <h1>Php oefening 021 - deel2</h1>

        <h2>Registratiegegevens</h2>
        <ul>
            <?php foreach ($aanmeldingsgegevens['data'] as $key => $value) : ?>
                <li><?= $key ?>: <?= $value?><li>
            <?php endforeach ?>
            
        </ul>

        <h2>Deel 2: adres</h2>

        <form action="opdracht-sessions-pagina-03-overzicht.php" method="POST">
            
            <ul>
                <li>
                    <label for="straat">straat</label>
                    <input type="text" id="straat" name="straat" value="" placeholder="vul straat in"  >
                </li>
                <li>
                    <label for="nummer">nummer</label>
                    <input type="text" id="nummer" name="nummer" value="" placeholder="vul nummer in"  >
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente" value="" placeholder="vul gemeente in"  >
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode" value="" placeholder="vul postcode in"  >
                </li>
            </ul>

            <input type="submit" name="submit">

        </form>
		

		
    </body>
</html>