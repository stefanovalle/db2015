<?php

include_once 'config.inc.php';
$id_prodotto = $_GET['id'];

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query di aggiornamento (UPDATE) delle visite
// $db->exec("<<QUERY DI AGGIORNAMENTO COUNTER");

// Query di selezione, per il prodotto e le relative varianti
$sql = '<<QUERY SELEZIONE>> '.
       'WHERE prodotti.id = ' . $id_prodotto;

$start = microtime(true);

$stmt = $db->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<head>
        <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<h1><?php echo $result[0]["nome"]; ?></h1>
	<h2><?php echo $result[0]["descrizione"]; ?></h2>
	<?php /* <p class="detail"><strong>Visite: <?php echo $result[0]["visite"]; ?></strong></p> */ ?>
	<p class="detail">Prezzo: <?php echo $result[0]["prezzo"]; ?> &euro;</p>
	<p class="detail">Data Arrivo: <?php echo $result[0]["dataarrivo"]; ?></p>
	<p class="detail">Varianti Disponibili: 
	<?php 
	$current = 0;
	foreach($result as $row) {
		      if (0 != $current++) {
                           echo ", ";
                      }
                      echo $row["variante"];
	       }
        ?>
	</p>

	<?php
		$time_taken = microtime(true) - $start;
	?>
	<br />
	<p><?php echo "Time taken: " . $time_taken; ?></p>
	<br />
	<br />
	<a href="./">Ritorna all'indice</a>
</body>
</html>
