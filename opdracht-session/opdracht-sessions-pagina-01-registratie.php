<?php 
 session_start();

$nickname = '';
$email = '';

if (isset($_SESSION['aanmeldingsgegevens']['data']['nickname']) && isset($_SESSION['aanmeldingsgegevens']['data']['email'])) {
	
	$nickname = $_SESSION['aanmeldingsgegevens']['data']['nickname'];
	$email = $_SESSION['aanmeldingsgegevens']['data']['email'];
}



if (isset($_GET['session'])) {
	if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: opdracht-sessions-pagina-01-registratie.php'); // staat in voor refresh
		}
}




?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Php oefening 021 - deel1</title>

    </head>
    <body>
		
		<h1>Php oefening 021 - deel1</h1>

		<h2>Deel1: registratiegegevens</h2>

		<form action="opdracht-sessions-pagina-02-adres.php" method="POST">
			
			<ul>
				<li>
					<label for="email">email</label>
					<input type="text" id="email" name="email" value="<?= $email ?>" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "email" ) ? 'autofocus' : '' ?>>
				</li>
				<li>
					<label for="nickname">nickname</label> 
					<input type="text" id="nickname" name="nickname" value="<?= $nickname ?> "  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "nickname" ) ? 'autofocus' : '' ?> >
				</li>
			</ul>

			<input type="submit" name="submit">

		</form>

		<hr>
		<a href="opdracht-sessions-pagina-01-registratie.php?session=destroy">Reset de sessie</a>
		
    </body>
</html>