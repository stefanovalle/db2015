<?php
include_once 'config.inc.php';
?>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<h1>SQL E-Commerce</h1>
	<h2>Elenco Prodotti</h2>
	<table id="products">
	<thead>
		<td>ID</td>
		<td>Prodotto</td>
		<td>Prezzo</td>
		<td>Data Arrivo</td>
		<td style="width: 140px">Azioni</td>
	</thead>
	<?php
	try {
	
	$db = new PDO($dsn , $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'SELECT * FROM PRODOTTI ORDER BY dataarrivo DESC';
	$start = microtime(true);
	foreach($db->query($sql) as $row){
	?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['nome']; ?></td>
		<td><?php echo $row['prezzo']; ?> &euro;</td>
		<td><?php echo $row['dataarrivo']; ?> &euro;</td>
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
	<p><?php echo "Time taken: " . $time_taken; ?></p>
</body>
</html>
