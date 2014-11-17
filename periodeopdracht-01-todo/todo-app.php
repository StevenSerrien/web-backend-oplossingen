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

if (!empty($_SESSION['todolist']['todo']['items'])) {
	$todoArray = $_SESSION['todolist']['todo']['items'];
}


if (!empty($_SESSION['todolist']['done']['items'])) {
	$doneArray = $_SESSION['todolist']['done']['items'];
}



var_dump($todoArray);

if (isset($_GET['session'])) {
	if($_GET['session'] === 'destroy')
		{
			session_destroy();
			header('Location: todo-app.php'); // staat in voor refresh
		}
}


//KNOPPEN VERWIJDEREN EN GEDAAN
if (isset($_GET['todoDelete'])) {
	foreach ($todoArray as $id => $item) {
		if ($_GET['todoDelete'] == $id ) {
			unset($todoArray[$id]);
			unset($_SESSION['todolist']['todo']['items'][$id]);
			
		}
	}
}
elseif (isset($_GET['todoDone'])) {
	foreach ($todoArray as $id => $item) {
		if ($_GET['todoDone'] == $id) {
			$_SESSION['todolist']['done']['items'][] = $_SESSION['todolist']['todo']['items'][$id];
			$doneArray = $_SESSION['todolist']['done']['items'];
			unset($todoArray[$id]);
			unset($_SESSION['todolist']['todo']['items'][$id]);
		}
	}
}
elseif (isset($_GET['doneDelete'])) {
	foreach ($doneArray as $id => $item) {
		if ($_GET['doneDelete'] == $id) {
			
			unset($doneArray[$id]);
			unset($_SESSION['todolist']['done']['items'][$id]);
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

<?php if (!empty($todoArray)) : ?>

<?php foreach  ($todoArray as $id => $item)  : ?>
 	<li> <?= $item ?> --- <a href="todo-app.php?todoDelete=<?= $id ?>">Verwijder</a> --- <a href="todo-app.php?todoDone=<?= $id ?>"> Gedaan </a></li>
<?php endforeach ?>

<?php endif ?>
</ul>

<h2> Done </h2>

<ul>
	<?php if (!empty($doneArray)) : ?>
<?php foreach  ($doneArray as $id => $item)  : ?>
 	<li> <?= $item ?> --- <a href="todo-app.php?doneDelete=<?= $id ?>">Verwijder</a> </li>
<?php endforeach ?>

<?php endif ?>
</ul>


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