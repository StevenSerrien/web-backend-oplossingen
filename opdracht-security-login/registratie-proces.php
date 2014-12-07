<?php

session_start();
//AUTLOAD
function __autoload($class)
{
    require_once($class . '.php');
}

if (isset($_POST['generatePassword'])) {
	$randomPassword = generatePassword(8, true, true, true, false);
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['password'] = $randomPassword;

	header('location: registratie-form.php');
}

if (isset($_POST['register'])) {

	$_SESSION['notification']['errorpassword'] = '';
	$_SESSION['notification']['errormail'] = '';

	//EMAIL EN PASSWORD VALIDATION
	$resultEmail = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );

	if ($_POST['password'] == '') {
		$resultPassword = false;
	}
	else
	{
		$resultPassword = true;
	}
	//REGISTRATIE
	if ($resultPassword && $resultEmail) {

		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = $_POST['password'];


		$db = new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root' );

		

		$SelectQuery = 'SELECT *
						FROM users
						WHERE email = :email';

		$statement = $db->prepare($SelectQuery);
		$statement->bindValue(":email", $_POST['email']);

		$statement->execute();
		$userData = array();

		while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$userData[] = $row;
		}

		if (isset($userData[0])) {
			$_SESSION['notification']['userexist'] = "User bestaat al met dat email adres.";
		}else
		{
			$_SESSION['notification']['userexist'] = "";
		}
						
	}
	//REGISTRATIE LOOPT FOUT
	else
	{
		if (!$resultEmail) {
			$ErrorEmail = "Email is niet geldig.";
			$_SESSION['notification']['errormail'] = $ErrorEmail;
		}
		elseif (!$resultPassword) {
			$ErrorPassword = "Paswoord is niet geldig.";
			$_SESSION['notification']['errorpassword'] = $ErrorPassword;
		}
	}
header('location: registratie-form.php');
}






function generatePassword($length, $capitalLetters, $smallLetters, $numbers, $specialTokens){

	$generatedPassword = '';
	$charsToGenerateFrom = '';

	if ($capitalLetters) {
		$charsToGenerateFrom .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	}

	if ($smallLetters) {
		$charsToGenerateFrom .= 'abcdefghijklmnopqrstuvwxyz';
	}
	if ($numbers) {
		$charsToGenerateFrom .= '0123456789';
	}
	if ($specialTokens) {
		$charsToGenerateFrom .= '-=~!@#$%^&*()_+,./<>?;:[]{}\|';
	}

	$charsToGenerateFrom = str_shuffle($charsToGenerateFrom);
	

	for ($i=1; $i <= $length; $i++) { 
		$charIndex = mt_rand(0, strlen($charsToGenerateFrom));
		$generatedPassword .= $charsToGenerateFrom[$charIndex];
	}

	return $generatedPassword;

}

?>