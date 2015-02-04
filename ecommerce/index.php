<?php
include_once 'config.inc.php';
?>
<h1>SQL E-Commerce</h1>
<h2>Elenco Prodotti</h2>
<table>
<thead>
<td>ID</td>
<td>Prodotto</td>
<td>Prezzo</td>
<td>Azioni</td>
</thead>
<?php
try {

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM PRODOTTI';
$start = microtime(true);
foreach($db->query($sql) as $row){
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['nome']; ?></td>
<td><?php echo $row['prezzo']; ?> &euro;</td>
<td><a href="./dettaglio.php?id=<?php echo $row['id']; ?>">Scheda</a></td>
</tr>
<?php
}
$time_taken = microtime(true) - $start;
}
catch (PDOException $e) {
print $e->getMessage();
}
?>
</table>
<br />
<br />
<?php echo "Time taken: " . $time_taken; ?>
