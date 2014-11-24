<?php 

try 
{
  $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root' ); //Connectie PDO

 

  $kolomNamen = array();

  $queryStringBrouwers = 'SELECT brouwers.brouwernr, brouwers.brnaam
                  FROM brouwers
                  ';

  $statementBrouwers = $db->prepare($queryStringBrouwers);

  $statementBrouwers->execute();

  $fetchAssoc = array();

  while ($row = $statementBrouwers->fetch(PDO::FETCH_ASSOC))
  {
    $fetchAssoc[] = $row;
  }

  $brouwerArray = array();
  foreach ($fetchAssoc as $key => $brouwer) {
    $brouwerArray[] = $brouwer;
  }

  //BIEREN
$bierenArray = array();
  if (isset($_GET['selectBrouwers'])) 
  {
    $geselecteerdeBrouwer = $_GET['selectBrouwers'];

    $queryStringBieren = 'SELECT bieren.naam
                          FROM bieren
                          WHERE bieren.brouwernr = :brouwernr';

    $statementBieren = $db->prepare($queryStringBieren);
    $statementBieren->bindValue(':brouwernr',  $geselecteerdeBrouwer);

    $statementBieren->execute();

    while ($row = $statementBieren->fetch(PDO::FETCH_ASSOC)) {
      $bierenArray[] = $row;
    }

    $kolomNamen[] = "Aantal";
    foreach ($bierenArray[0] as $key => $value) {
    $kolomNamen[] = $key;
    var_dump($geselecteerdeBrouwer);
  }
}

var_dump($bierenArray);





  
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

?>

<html>
<head>
  <title>Opdracht CRUD Query</title>
  <style>

 
      tbody tr:nth-of-type(odd) {
      background-color:#FFDADA;
      }

  </style>
</head>
<body>
<h1>Tabel opdracht CRUD Query - deel 2 </h1>

<form action="opdracht-CRUD-query-deel2.php" method="GET">
        <ul>
          <li>
            <select name="selectBrouwers">
             
              <?php foreach ($brouwerArray as $key => $value) : ?>
                <option value=<?= $value['brouwernr']  ?>><?= $value['brnaam'] ?></option>
              <?php endforeach ?>
            </select>
        </ul>
        <input type="submit" name="submit" value="Geef mij alle bieren van deze brouwerij.">
      </form>
    
<h1>Opgevraagde bieren van deze brouwer</h1>

<table>
<thead>

<tr>
<?php foreach ($kolomNamen as $value) : ?>
  <th><?php echo $value ?> </th>
<?php endforeach ?>
</tr>

</thead>

<tbody>

<?php if (isset($_GET['submit'])) : ?>
  # code...

<?php foreach ($bierenArray as $key => $value) : ?>
<tr>
<td><?= $key ?></td>
<td><?= $value['naam'] ?></td>
</tr>
 
<?php endforeach ?>
<?php endif ?>
</tbody>
<tfooter>
</tfooter>
</table>


</body>
</html>