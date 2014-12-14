<?php 
session_start();

if ($_GET['logout']) {
	setcookie('login', '', time() - 3600);
	$_SESSION['notification']['logout'] = 'U bent uitgelogd. Tot de volgende keer.';
	header('location: login-form.php');
}

?>