<?php
//page de chargement automatique des classes

//fonction qui charge les fichiers classes
//spl_autoload_register : fonction predefinie qui appelle la fonction d'autoload lors d'une rencontre du mot new

function autoload($nom_classe) {
    if (file_exists('./lib/php/classes/' . $nom_classe . '.class.php')) {
        require './lib/php/classes/' . $nom_classe . '.class.php';
    } else if (file_exists('./admin/lib/php/classes/' . $nom_classe . '.class.php')) {
        require './admin/lib/php/classes/' . $nom_classe . '.class.php';
    } else {
        print "aucune classe chargée: " . $nom_classe;
    }
}
spl_autoload_register('autoload');

