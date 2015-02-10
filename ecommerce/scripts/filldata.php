#!/usr/bin/php
<?php
include(__DIR__ . "/../config.inc.php");
try {
$db = new PDO($dsn , $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("INSERT INTO macrocategorie (nome) VALUES ('Sport')");
echo "Macrocategoria Sport Inserita\n";

$categorie = array('Pallacanestro',
'Baseball',
'Hockey',
'Football',
'Calcio',
'Volley',
'Tennis',
'Sci',
'Golf');

$i_macroCat = $db->lastInsertId('macrocategorie_id_seq');
$ai_catId = array();

for ($x=0; $x< count($categorie); $x++) {
$db->exec("INSERT INTO categorie (nome, macrocategoria_id) VALUES ('".$categorie[$x]."', " . $i_macroCat . ")");
$ai_catId[] = $db->lastInsertId('categorie_id_seq');

echo "Categoria ".$categorie[$x]." creata\n";
}

// Varianti
// Prodotti
echo "Tabella varianti/prodotto creata\n";
$namebase = array('pingo', 'pongo', 'bum', 'bam', 'foo',
'baz', 'bar', 'pogo', 'dogo', 'sole',
'luna', 'volo', 'air', 'fire', 'tee');
$prodottovariante = 0;
$db->beginTransaction();

$ai_prodId = array();

for ($x=0; $x< 10000; $x++) {
$categoria = $ai_catId[rand(2, (count($categorie)))-1];
$prezzo = (rand(1, 200) * 10);
$venduti = rand (0, 5000);
$dataarrivo = '2014-05-07 '.rand(1,23).':'.rand(0,59);
$namebaseel = count($namebase) - 1;
$nome = $namebase[rand(0, $namebaseel)].$namebase[rand(0, $namebaseel)];
if (rand(0,1) == 1) {
$nome .= " ".$namebase[rand(0, $namebaseel)];
}
$db->exec("INSERT INTO prodotti (nome, prezzo, visite, dataarrivo, categoria_id) VALUES ('". 
$nome ."',".$prezzo.",".$venduti.",'".$dataarrivo."',".$categoria.")");
$ai_prodId[$x] = $db->lastInsertId('prodotti_id_seq');

echo "Prodotto ".$nome." creato\n";

$db->exec("INSERT INTO prodottivarianti (prodotto_id, variante_id) VALUES (".$ai_prodId[$x].",".rand(1,3).")");
$db->exec("INSERT INTO prodottivarianti (prodotto_id, variante_id) VALUES (".$ai_prodId[$x].",".rand(4,5).")");
echo "Varianti Prodotto ".$nome." create\n";

}
	$db->commit();
}
catch(PDOException $e) {
echo 'Ahia! '.$e->getMessage()."\n";
}
