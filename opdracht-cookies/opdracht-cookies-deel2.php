<?php

$username = '';
$paswoord = '';
$errorMessage = "";
$isIngelogd = false;

$txt = file_get_contents('deel1.txt');
$txt = explode(',', $txt);

if (isset($_GET['logout'])) {
	setcookie('authenticated', '', time() - 360);
	header( 'location: opdracht-cookies-deel1.php' );
}

if (isset($_POST['submit'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];


	if (($username == $txt[0]) && ($password == $txt[1])) {
		
			if (isset($_POST['rememberMe'])) {
				$cookieTijd = 2592000;
			}
			else
			{
				$cookieTijd = 360;
			}

		setcookie('authenticated', true, time() + $cookieTijd);
		header( 'location: opdracht-cookies-deel1.php' );
	}
	else
	{
		$errorMessage = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
	}


}

if (isset($_COOKIE['authenticated'])) {
	$errorMessage = "U bent ingelogd.";
	$isIngelogd = true;
}
?>
<!DOCTYPE html>
<html>
<head></head>
	<body>
	

		<h1>Inloggen</h1>
		<?php if ($errorMessage): ?>
			<?=	$errorMessage ?>
		<?php endif ?>
		
		<?php if ( !$isIngelogd) : ?>
				
			<form action="opdracht-cookies-deel1.php" method="POST">
				<ul>
					<li>
						<label for="username">Gebruikersnaam: </label>
						<input type="text" name="username" id="username" value="">
					</li>
					<li>
						<label for="password">Paswoord: </label>
						<input type="password" name="password" id="password" value="">
					</li>
					<li>
						<label for="rememberMe">Mij onthouden: </label>
						<input type="checkbox" name="rememberMe" id="rememberMe">
					</li>
				</ul>
				<input type="submit" name="submit" value="inloggen">
			</form>
		<?php else: ?>

		<a href="opdracht-cookies-deel1.php?logout=true">Uitloggen</a>
		<?php endif ?>


	</body>
</html>




