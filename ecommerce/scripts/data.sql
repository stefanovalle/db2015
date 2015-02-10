INSERT INTO macrocategorie VALUES (1, 'Tempo Libero');
SELECT pg_catalog.setval('macrocategorie_id_seq', 1, true);

INSERT INTO categorie VALUES (1, 'Giardinaggio', 1);
INSERT INTO categorie VALUES (2, 'Modellismo', 1);
INSERT INTO categorie VALUES (3, 'Fotografia', 1);
SELECT pg_catalog.setval('categorie_id_seq', 3, true);

INSERT INTO prodotti VALUES (1, 'F16 Scala 1:35', 20.00, 'Modello di F16 Fighting Falcon, in scala 1:35.', '2015-01-01 10:00:00+01', 2);
INSERT INTO prodotti VALUES (2, 'Nikon D35000', 1200.00, 'Macchina fotografica digitale SLR Nikon D35000. 47MP. Full Frame.', '2015-02-01 10:00:00+01', 3);
INSERT INTO prodotti VALUES (3, 'Canon EPS414', 980.00, 'Fotocamera digitale SLR Cenon EPS414 con stabilizzatore.', '2015-02-02 10:45:00+01', 3);
SELECT pg_catalog.setval('prodotti_id_seq', 3, true);

INSERT INTO varianti VALUES (1, 'Nero');
INSERT INTO varianti VALUES (2, 'Rosso');
INSERT INTO varianti VALUES (3, 'Blu');
INSERT INTO varianti VALUES (4, 'Giallo');
INSERT INTO varianti VALUES (5, 'Mimetico');
SELECT pg_catalog.setval('varianti_id_seq', 5, true);

INSERT INTO prodottivarianti VALUES (1, 5);
INSERT INTO prodottivarianti VALUES (2, 1);
INSERT INTO prodottivarianti VALUES (2, 2);
INSERT INTO prodottivarianti VALUES (3, 1);
INSERT INTO prodottivarianti VALUES (3, 3);
INSERT INTO prodottivarianti VALUES (3, 4);

