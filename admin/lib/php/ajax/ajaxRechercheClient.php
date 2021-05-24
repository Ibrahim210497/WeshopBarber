<?php
header('Content-Type: application/json');
/*
 * inclure les fichiers nécessaire à la communication avec la BD car on ne passe par l'index
 * Ce fichier est appelé par fonctions_jquery.js
 */
//A partir de admin/lib/php/ajax, revenir dans dossier précédent
include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Client.class.php');
include ('../classes/ClientBD.class.php');
$cnx = Connexion::getInstance($dsn,$user,$password);
$cl = array();
$client = new ClientBD($cnx);


$cl[] = $client->getClientByMat($_GET['mat']);
print json_encode($cl);


