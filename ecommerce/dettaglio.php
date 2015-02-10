<?php

include_once 'config.inc.php';
$id_prodotto = $_GET['id'];

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// INSERIRE AL POSTO DI <<QUERY>> LA QUERY PER LA SELEZIONE 
// DEL SOLO PRODOTTO CON ID $id_prodotto
$sql = '<<QUERY>>';
$start = microtime(true);

// COSA FANNO QUESTE DUE RIGHE?
// $comando = $db->query($sql);
// $riga = $comando->fetch(PDO::FETCH_ASSOC);

?>
<html>
<head>
        <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

	<h1><?php echo $result["nome"]; ?></h1>
	<h2><?php echo $result["descrizione"]; ?></h2>
	<p class="detail">Prezzo: <?php echo $result["prezzo"]; ?></p>
	<p class="detail">Data Arrivo: <?php echo $result["dataarrivo"]; ?></p>

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
