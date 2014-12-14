<?php 
session_start();

$logoutMessage = '';
$loginError = '';
$email = '';
$password = "";

if (isset($_SESSION['notification']['logout'])) {
	$logoutMessage = $_SESSION['notification']['logout'];
}
if (isset($_SESSION['notification']['login']['error'])) {
	$loginError = $_SESSION['notification']['login']['error'];
}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        
        <h1>Inloggen</h1>
        <?php echo $logoutMessage ?>
        <?php echo $loginError ?>
        <form action="login-process.php" method="POST">
        <ul>
        	<li>
        		<label for="email">e-mail</label>
				<input type="text" name="email" id="email" value="<?= $email ?>" >
                
			</li>
			<li>
				<label for="paswoord">paswoord</label>
				<input type="text" name="password" id="password"  value="<?= $password ?>">
				
                
			</li>
			<li>
				<input type="submit" name="login" value="login">
			</li>
			<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a></p>

		</ul>
        </form>
        <a href="registratie-form.php?session=destroy">Reset de sessie</a>
    </body>
    </body>
</html>