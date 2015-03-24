<?php

include_once 'config.inc.php';
require_once('./sag/src/Sag.php');

//creazione connessione a couch
//$couchdb = new Sag....

//selezione database
//$couchdb->....

//dati ricevuti dal dettaglio prodotto
$id_prodotto = $_POST['id'];
$quantita = $_POST['quantita'];
$variante = $_POST['variante'];

//dati cliente
//(supponiamo di recuperali dalla sessione o riceverli da una form dati)
//$nome_cognome_cliente = .....

$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Query di selezione
$sql = 'SELECT * FROM prodotti WHERE prodotti.id = ' . $id_prodotto;

$stmt = $db->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$dati_prodotto = $result[0];


//salvataggio dati su couchdb
try {

    //creazione array con i dati dell'ordine
    $ordine = array(
        'id_prodotto' => $id_prodotto,
        'nome' => $dati_prodotto['nome'],
        //'prezzo' => 
        //'descrizione' => 
        //'variante' => 
        //'quantita' => 
        //'cliente' => 
    );

    $ordine_json = json_encode($ordine);

    //creazione del documento su couchdb
    //$risultato_post = .....

    if($risultato_post->body->ok) {
        echo 'Ordine memorizzato correttamente! ID = ' . $risultato_post->body->id;
    } else {
        echo 'Errore nella memorizzazione dei dati';
    }


} catch(Exception $e) {
    echo "Errore: " . $e->getMessage();
}
