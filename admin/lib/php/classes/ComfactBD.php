<?php

class ComfactBD extends Comfact {
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data=array();
    private $_resulset;

    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }




    public function DeleteCommande($id_comfact)
    {
        try {
            $query = "DELETE FROM comfact WHERE id_comfact= :id_comfact";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_comfact', $id_comfact);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }


    public function ajout_commande($id_produit,$quantite,$date_livraison,$id_clt){
        try{


            $query="insert into comfact(id_produit,prix,quantite,date_livraison,id_clt) values ((:id_produit,select prix from produit where id_produit=:id_produit),:quantite,:date_livraison,:id_clt)";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_produit', $id_produit);
           // $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':quantite', $quantite);
            $_resultset->bindValue(':date_livraison', $date_livraison);
            $_resultset->bindValue(':id_clt', $id_clt);

            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }



    public function getAllCommandes(){
        $query ="select * from comfact";
        $_resultset = $this->_db->prepare($query);
        $_resultset->execute();

        while($d = $_resultset->fetch()){
            $_data[] = new Comfact($d);
        }
        return $_data;
    }


}



