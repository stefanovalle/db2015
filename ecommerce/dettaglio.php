<?php

include_once 'config.inc.php';

require 'predis/autoload.php';
Predis\Autoloader::register();

// Istanziare un client Redis (Predis)
// $redis = new XXX;  

$id_prodotto = $_GET['id'];

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("UPDATE prodotti SET visite = visite+1 WHERE id='" . $id_prodotto . "'");

$start = microtime(true);

// Verificare se l'oggetto con chiave $id_prodotto esiste in Redis (usare $redis)
//if () {
  echo "Not cached<br />";

  // Query di aggiornamento (UPDATE) delle visite

  // Query di selezione, per il prodotto e le relative varianti
  $sql = 'SELECT prodotti.id, prodotti.nome, prodotti.descrizione, prodotti.prezzo, prodotti.dataarrivo, prodotti.visite, varianti.nome as variante '.
       'FROM PRODOTTI JOIN prodottivarianti on prodotti.id = prodottivarianti.prodotto_id '.
       'JOIN varianti on prodottivarianti.variante_id = varianti.id '.
       'WHERE prodotti.id = ' . $id_prodotto;

  $stmt = $db->query($sql);

  // Viene recuperato il primo record, con le informazioni del prodotto
  $row = $stmt->fetch();
  $item = $row;

  // Vengono recuperate le varianti
  $varianti = $row['variante'];
  while ($row = $stmt->fetch()) {
	$varianti .= ', ' . $row['variante'];
  }
  $item['variante'] = $varianti;

  $data = json_encode($item, true);

  // Settare nella cache l'item serializzato (vedi sotto esempio deserializzazione)
  // $redis->set(XXX) or die ("Failed to save data at the server");

//} else {
//  echo "Cached!<br />";
// Prelevare item dalla cache di Redis...
//  $item = json_decode(XXX, true);
//}


?>
<html>
<head>
        <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<h1><?php echo $item["nome"]; ?></h1>
	<h2><?php echo $item["descrizione"]; ?></h2>
	<p class="detail"><strong>Visite: <?php echo $item["visite"]; ?></strong></p>
	<p class="detail">Prezzo: <?php echo $item["prezzo"]; ?> &euro;</p>
	<p class="detail">Data Arrivo: <?php echo $item["dataarrivo"]; ?></p>
	<p class="detail">Varianti Disponibili: <?php  echo $item["variante"]; ?></p>
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
