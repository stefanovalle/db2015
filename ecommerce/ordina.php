<?php

include_once 'config.inc.php';

//dati ricevuti dal dettaglio prodotto
$id_prodotto = $_POST['id'];
$quantita = $_POST['quantita'];
$variante = $_POST['variante'];

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query di selezione, per il prodotto e le relative varianti
$sql = 'SELECT * FROM prodotti WHERE prodotti.id = ' . $id_prodotto;

$stmt = $db->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dati_prodotto = $result[0];





