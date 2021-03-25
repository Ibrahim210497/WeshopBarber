<?php

class ProduitBD extends Produit{
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data=array();
    private $_resulset;
    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }

    public function getAllProduit(){
        $query ="select * from vue_produit_cat";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new Produit($d);
        }
        return $_data;
    }

    public function getProduitsByCat($id_cat){
        try{
            $query="select * from vue_produit_cat where id_cat=:id_cat";
            $_resulset = $this-> _db->prepare($query);
            $_resulset->bindValue(':id_cat',$id_cat);
            $_resulset->execute();


            while($d = $_resulset->fetch()){
                $_data[] = new produit($d);
            }
            // var_dump($_data);

            return $_data;
        }catch(PDOException $e){
            print "Echec de la requête ".$e->getMessage();

        }
    }
}



