<?php 

if (isset($_COOKIE['login'])) {

	$cookieArray = array();
	$cookieArray = explode(',', $_COOKIE['login'])

	$email = $cookieArray[0];
	$hashedEmail = $cookieArray[1];

	$db = new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root' );

	$selectQuery = 'SELECT salt
					FROM users
					WHERE email = :email';

	$selectStatement = $db->prepare($selectQuery);
	$selectStatement->bindValue(':email', $email);

	$selectStatement->execute();

	$saltArray = array();

	while($row = $selectStatement->fetch( PDO::FETCH_ASSOC))
		
		{
				$saltArray[]	=	$row;
		}

	var_dump($saltArray);
}
else
{
	//header('location: login-form.php');
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
        
        <script src="js/main.js"></script>
    </body>
</html>
