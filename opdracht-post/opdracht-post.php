<?php 
$password = 'qwerty';
$username = 'Steven';

if (isset($_POST['submit'])) {
  if ($_POST['username'] == $username && $_POST['password'] == $password) 
    {
      $message = "Correcte details.";
    }
    else
    {
      $message ="Username of paswoord is niet correct.";
    }
  }
 


?>
<!DOCTYPE html>
<html>
<head>
	<title>Oplossing post: deel1</title>
</head>
<body class="php-inleiding">

	<h1>Oplossing post: deel1</h1>

	<h2>Log in</h2>

	<p><?php if (isset($_POST['submit'])) {echo $message;

  }?></p>

	<form action="opdracht-post.php" method="POST">
		
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" value="info@test.be">
			</li>
			<li>
				<label for="password">Paswoord:</label>
				<input type="password" name="password" id="password" value="azerty">
			</li>
		</ul>

		<input type="submit" name="submit" value="Verzend">

	</form>
</body>
</html>