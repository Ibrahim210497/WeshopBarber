<?php

class ProduitBD extends Produit{
    private $_db;// va recevoir la valeur de $cnx dans les 1st ligne de connexion a la BD  dans l'index
    private $_data=array();
    private $_resulset;
    public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
        $this->_db = $cnx;
    }
    public function updateProduit($champ,$id,$valeur){
        try{
            //appeler une proccedure emnbarquée
            $query = "update produit set ".$champ."='".$valeur."' where id_produit='".$id."'";
            $resulset= $this->_db->prepare($query);//transformer la requete
            $resulset->execute();
        }catch(PDOException $e)
        {
            print $e->getMessage();
        }
    }
    public function getProduitByRef($ref){
        try {
            $this->_db->beginTransaction();
            $query = "select * from produit where reference = :ref";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':ref', $ref);
            $resultset->execute();
            $data = $resultset->fetch();
            return $data;
//renvoyer un objet nécéssite adaptation dans ajax pour retour json
// donc retourner objet simple, qui sera stocké dans un élément de tableau json


            $this->_db->commit();

        } catch(PDOException $e){
            print "Echec de la requête : ".$e->getMessage();
            $_db->rollback();
        }

    }
    public function mise_a_jourProduit($id_produit,$id_cat,$nom_produit,$description,$image,$prix,$stock,$reference){
        try{
            $query="update produit set id_cat=:id_cat,nom_produit=:nom_produit,description=:description,image=:image,prix=:prix,stock=:stock,reference=:reference where id_produit=:id_produit";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_produit', $id_produit);
            $_resultset->bindValue(':nom_produit', $nom_produit);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':image', $image);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();

        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    public function DeleteProduit($id_produit)
    {
        try {
            $query = "DELETE FROM produit WHERE id_produit= :id_produit";
            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_produit', $id_produit);
            $_resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }


    public function ajout_produit($id_cat,$nom_produit,$description,$image,$prix,$stock,$reference){
        try{
            $query="insert into produit(id_cat,nom_produit,description,image,prix,stock,reference) values ";
            $query.="(:id_cat,:nom_produit,:description,:image,:prix,:stock,:reference)";

           /* print 'la catégorie est' .$id_cat;
            $query="insert into produit(id_cat,nom_produit,description,image,prix,stock,reference) values ";
            $query.="('$id_cat','$nom_produit','$description','$image','$prix','$stock','$reference')";*/

            $_resultset = $this->_db->prepare($query);
            $_resultset->bindValue(':id_cat', $id_cat);
            $_resultset->bindValue(':nom_produit', $nom_produit);
            $_resultset->bindValue(':description', $description);
            $_resultset->bindValue(':image', $image);
            $_resultset->bindValue(':prix', $prix);
            $_resultset->bindValue(':stock', $stock);
            $_resultset->bindValue(':reference', $reference);
            $_resultset->execute();
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

    //Spécial AJAX
    public function getProduitById2($id_produit){
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_produit_cat where id_produit = :id_produit";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_produit', $id_produit);
            $resultset->execute();
            $data = $resultset->fetch();
            //var_dump($data);
            return $data;
            //renvoyer un objet nécéssite adaptation dans ajax pour retour json
            // donc retourner objet simple, qui sera stocké dans un élément de tableau json


            $this->_db->commit();


        } catch(PDOException $e){
            print "Echec de la requête : ".$e->getMessage();
            $_db->rollback();
        }

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



