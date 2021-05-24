<?php
session_start();
header('Content-Type: application/json');
require '../pg_connect.php';
require '../classes/Connexion.class.php';
require '../classes/Comfact.class.php';
require '../classes/ComfactBD.class.php';

$cnx = Connexion::getInstance($dsn,$user,$password);


//try catch ici
$tab= array();
$comfact = new ComfactBD($cnx);
extract($_GET,EXTR_OVERWRITE);
var_dump($_GET);
print "session : ".$_SESSION['id'];
//On veut un tableau json --> pr[]
$com[] = $comfact->ajout_commande($quantite,$_SESSION['id'],$id_produit);
//la var de session recupere l'id du client

print json_encode($tab);

