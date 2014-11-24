<?php 

try 
{
  $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root' ); //Connectie PDO

  $reqLike1 = "%a%";
  $reqLike2 = "Du%";

  $kolomNamen = array();

  $queryString = 'SELECT * 
                  FROM bieren
                  INNER JOIN brouwers
                  ON bieren.brouwernr = brouwers.brouwernr
                  WHERE brouwers.brnaam LIKE :reqLike1
                  AND bieren.naam LIKE :reqLike2'
                  ;

  $statement = $db->prepare($queryString);
  $statement->bindValue(':reqLike1', $reqLike1);
  $statement->bindValue(':reqLike2', $reqLike1);

  $statement->execute();

  $fetchAssoc = array();

  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
    $fetchAssoc[] = $row;
  }

$kolomNamen[] = "#";
foreach ($fetchAssoc[0] as $key => $value) {
  $kolomNamen[] = $key;
}

var_dump($fetchAssoc);
var_dump($kolomNamen);

  
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

?>
<html>
<head>
  <title>Opdracht CRUD Query</title>
  <style>

 
      tbody tr:nth-of-type(even) {
      background-color:#FFDADA;
      }

  </style>
</head>
<body>
<h1>Tabel opdracht CRUD Query </h1>

<table>
<thead>

<?php foreach ($kolomNamen as $value) : ?>
  <th><?php echo $value ?> </th>
<?php endforeach ?>
</tr>

</thead>

<tbody>
<?php foreach ($fetchAssoc as $key => $value) : ?>

  <tr>
    <td><?= $key ?></td>
    <?php foreach ($value as $bier) : ?>

      <td><?= $bier ?> </td>
    <?php endforeach ?>
  </tr>

<?php endforeach ?>

</tbody>
<tfooter>
</tfooter>
</table>

</body>
</html>