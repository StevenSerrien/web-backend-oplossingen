<?php

$username = '';
$paswoord = '';
$errorMessage = "";
$isIngelogd = false;

$txt = file_get_contents('deel2.txt');
$txt = explode(',', $txt);
$lengteTxt = count($txt);

if (isset($_GET['logout'])) {
	setcookie('authenticatedUser', '', time() - 360);
	header( 'location: opdracht-cookies-deel3.php' );
}

if (isset($_POST['submit'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];


	$i = 0;
	while ( $i < $lengteTxt ) { 
		
		if (($username == $txt[$i]) && ($password == $txt[$i+1])) {
		
			if (isset($_POST['rememberMe'])) {
				$cookieTijd = 2592000;
			}
			else
			{
				$cookieTijd = 360;
			}

			setcookie('authenticatedUser', $txt[$i], time() + $cookieTijd);
			header( 'location: opdracht-cookies-deel3.php' );
			}
			else
			{
				$errorMessage = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
			}

			$i = $i + 2;



	}
	

}

if (isset($_COOKIE['authenticatedUser'])) {

	$user = $_COOKIE['authenticatedUser'];
	$errorMessage = "Dag " .$user. "! U bent ingelogd.";
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
				
			<form action="opdracht-cookies-deel3.php" method="POST">
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

		<a href="opdracht-cookies-deel3.php?logout=true">Uitloggen</a>
		<?php endif ?>


	</body>
</html>




