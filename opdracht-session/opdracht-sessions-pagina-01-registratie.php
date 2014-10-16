<?php 
 session_start();





?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Php oefening 021 - deel1</title>

    </head>
    <body>
		
		<h1>Php oefening 021 - deel1</h1>

		<h2>Deel1: registratiegegevens</h2>

		<form action="opdracht-sessions-pagina-02-adres.php" method="POST">
			
			<ul>
				<li>
					<label for="email">email</label>
					<input type="text" id="email" name="email" value="" >
				</li>
				<li>
					<label for="nickname">nickname</label>
					<input type="text" id="nickname" name="nickname" value=""  >
				</li>
			</ul>

			<input type="submit" name="submit">

		</form>

		
    </body>
</html>