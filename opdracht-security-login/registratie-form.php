<?php 
session_start();


//RESET
if (isset($_GET['session'])) {
    if($_GET['session'] === 'destroy')
        {
            session_destroy();
            header('Location: registratie-form.php'); // staat in voor refresh
        }
}
//RESET
$email = "";
$password = "";

$errorEmail = "";
$errorPassword = "";
$userExist = "";

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
}

if (isset($_SESSION['notification'])){
    
    $errorPassword = $_SESSION['notification']['errorpassword'];
    $errorEmail = $_SESSION['notification']['errormail'];
    $userExist = $_SESSION['notification']['userexist'];

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
                <?= $errorEmail ?>
                <?= $userExist ?>
			</li>
			<li>
				<label for="paswoord">paswoord</label>
				<input type="text" name="password" id="password"  value="<?= $password ?>">
				<input type="submit" name="generatePassword" value="Genereer een paswoord">
                <?= $errorPassword ?>
			</li>
			<li>
				<input type="submit" name="register" value="registreer">
			</li>

		</ul>
        </form>
        <a href="registratie-form.php?session=destroy">Reset de sessie</a>
    </body>
</html>