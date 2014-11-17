<?php 
session_start();

$todoArray = array();
$doneArray = array();
	
if (!isset($_POST['submit'])) {
	//$i = 0;
}


if (isset($_POST['submit'])) {
	
	 $_SESSION['todolist']['todo']['items'][] = $_POST['beschrijving'];

     //$_SESSION['todolist']['done'] = $_POST['email'];
}
$todoArray = $_SESSION['todolist']['todo']['items'];


var_dump($todoArray);

if (isset($_GET['session'])) {
	if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: todo-app.php'); // staat in voor refresh
		}
}

if (isset($_GET['todoDelete'])) {
	foreach ($todoArray as $id => $item) {
		if ($_GET['todoDelete'] == $id ) {
			unset($todoArray[$id]);
			unset($_SESSION['todolist']['todo']['items'][$id]);
			
		}
	}
}
var_dump($todoArray);


?>


<html>
<head>
	<title>TOdo App</title>
</head>
<body>

<h1>ToDo App</h1>
<h2>Nog te doen:</h2>
<ul>
<?php foreach  ($todoArray as $id => $item)  : ?>
 	<li> <?= $item ?> --- <a href="todo-app.php?todoDelete=<?= $id ?>">Verwijder</a> </li>
<?php endforeach ?>
</ul>

<h2> Done </h2>


<h2> Voeg een item toe </h2>
<form action="todo-app.php" method="POST">
				<ul>
					<li>
						<label for="beschrijving">Beschrijving: </label>
						<input type="text" name="beschrijving" id="beschrijving" value="">
					</li>
				</ul>
				<input type="submit" name="submit" value="Toevoegen">
</form>

<a href="todo-app.php?session=destroy">Reset de sessie</a>
</body>
</html>