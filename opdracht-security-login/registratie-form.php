
<?php 
session_start();

//AUTOLOAD
function __autoload($class)
{
    require_once($classname . '.php');
}

$email = "";
$password = "";

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
}


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht security</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
    	<h1>Registreren</h1>

        <form action="registratie-proces.php" method="POST">
        <ul>
        	<li>
        		<label for="email">e-mail</label>
				<input type="text" name="email" id="email" value="<?= $email ?>" >
			</li>
			<li>
				<label for="paswoord">paswoord</label>
				<input type="text" name="paswoord" id="paswoord"  value="<?= $password ?>">
				<input type="submit" name="generatePassword" value="Genereer een paswoord">
			</li>
			<li>
				<input type="submit" name="register" value="registreer">
			</li>

		</ul>
        </form>
        
    </body>
</html>