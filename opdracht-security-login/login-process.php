<?php 

	session_start();

	$_SESSION['notification']['login']['error'] = '';
	
	if (isset($_POST['login'])) {


	$resultEmail = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL );

	if ($_POST['password'] == '') {
		$resultPassword = false;
		
	}
	else
	{
		$resultPassword = true;
	}
	//LOGIN

	if ($resultPassword && $resultEmail) {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');

		$loginQuery = 'SELECT *
					   FROM users
					   WHERE email = :email';

		$loginStatement = $db->prepare($loginQuery);
		$loginStatement->bindValue(":email", $_POST['email']);
		$loginStatement->execute();

		$usersArray = array();

		while ($row = $loginStatement->fetch(PDO::FETCH_ASSOC)) {
		$usersArray[] = $row;
		}

		if (!empty($usersArray)) {
			$salt = $usersArray[0]['salt'];
			$saltedPassword = $salt . $password;
			$hashedPassword = hash('sha512', $saltedPassword);

			if ($hashedPassword == $usersArray[0]['hashed_password']) {
				setcookie('login', $cookieValue, time()+(3600*24*30));
				header('location: dashboard.php');
			}
			else
			{
				$_SESSION['notification']['login'] = 'Aanmeldingsgegevens kloppen niet.'
				header('location: login-form.php');
			}
		}
		else
		{
			$_SESSION['notification']['login'] = "Geen user met dat email adres gevonden.";
		}
	}
	else
		//Aanmeldingsgegevens kloppen niet.
	{
		$_SESSION['notification']['login'] = "Username of paswoord is niet geldig.";
	}
}






?>
