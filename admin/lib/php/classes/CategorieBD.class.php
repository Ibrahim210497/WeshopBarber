<?php

class CategorieBD extends Categorie{
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data=array();
    private $_resulset;
    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getCategorie(){
        $query ="select * from categorie";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new Categorie($d);
        }
        //var_dump($_data);
        return $_data;
    }
}



