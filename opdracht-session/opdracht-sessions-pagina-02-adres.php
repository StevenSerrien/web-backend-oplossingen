<?php 

session_start();

if (isset($_POST['submit'])) {

    $_SESSION['aanmeldingsgegevens']['data']['nickname'] = $_POST['nickname'];
    $_SESSION['aanmeldingsgegevens']['data']['email'] = $_POST['email'];
    
}
$aanmeldingsgegevens['data'] = $_SESSION['aanmeldingsgegevens']['data'];

//Lege string variabelen
$straat = '';
$nummer = '';
$gemeente = '';
$postcode = '';

if (isset($_SESSION['aanmeldingsgegevens']['adres'])) {
    $straat = $_SESSION['aanmeldingsgegevens']['adres']['straat'];
    $nummer = $_SESSION['aanmeldingsgegevens']['adres']['nummer'];
    $gemeente = $_SESSION['aanmeldingsgegevens']['adres']['gemeente'];
    $postcode = $_SESSION['aanmeldingsgegevens']['adres']['postcode'];
}

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
                    <input type="text" id="straat" name="straat" value="<?= $straat ?>" placeholder="vul straat in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "straat" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="nummer">nummer</label>
                    <input type="text" id="nummer" name="nummer" value="<?= $nummer ?>" placeholder="vul nummer in" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "nummer" ) ? 'autofocus' : '' ?> >
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente" value="<?= $gemeente ?>" placeholder="vul gemeente in" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "gemeente" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode" value="<?= $postcode ?>" placeholder="vul postcode in" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "postcode" ) ? 'autofocus' : '' ?> >
                </li>
            </ul>

            <input type="submit" name="submit">

        </form>
		

		
    </body>
</html>