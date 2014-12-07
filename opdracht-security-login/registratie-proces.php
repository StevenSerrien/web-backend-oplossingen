<?php

session_start();
//AUTLOAD
function __autoload($class)
{
    require_once($classname . '.php');
}

if (isset($_POST['generatePassword'])) {
	$randomPassword = generatePassword(8, true, true, true, false);
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['password'] = $randomPassword;

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