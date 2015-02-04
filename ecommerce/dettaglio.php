<?php

include_once 'config.inc.php';
$id_prodotto = $_GET['id'];

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = '<< INSERIRE QUI LA QUERY >>';
$start = microtime(true);

// $comando = $db->query($sql);
// $riga = $comando->fetch(PDO::FETCH_ASSOC);

?>
<h1>NOME PRODOTTO</h1>
<h2>DESCRIZIONE PRODOTTO</h2>
<p>Prezzo: PREZZO</p>
<p>Data Arrivo: DATA ARRIVO</p>

<?php
$time_taken = microtime(true) - $start;
?>
<br />
<?php echo "Time taken: " . $time_taken; ?>
<br />
<a href="./">Ritorna all'indice</a>
