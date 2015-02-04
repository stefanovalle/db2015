<?php

include_once 'config.inc.php';
$id_prodotto = $_GET['id'];

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM PRODOTTI WHERE id = ' . $id_prodotto;
$start = microtime(true);

$stmt = $db->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<h1><?php echo $result["nome"]; ?></h1>
<h2><?php echo $result["descrizione"]; ?></h2>
<p>Prezzo: <?php echo $result["prezzo"]; ?></p>
<p>Data Arrivo: <?php echo $result["dataarrivo"]; ?></p>

<?php
$time_taken = microtime(true) - $start;
?>
<br />
<?php echo "Time taken: " . $time_taken; ?>
<br />
<a href="./">Ritorna all'indice</a>
