<?php
 class ClientBD extends Client{

     private $_db;
     private $_array = array();
     private $_resulset;

     public function __construct($cnx){//$cnx envoyé depuis la page qui instancie
         $this->_db = $cnx;
     }


     public function getClientByMat($mat){
         try {
             $this->_db->beginTransaction();
             $query = "select * from client where matricule = :mat";
             $resultset = $this->_db->prepare($query);
             $resultset->bindValue(':mat', $mat);
             $resultset->execute();
             $data = $resultset->fetch();
             return $data;

             $this->_db->commit();

         } catch(PDOException $e){
             print "Echec de la requête : ".$e->getMessage();
             $_db->rollback();
         }

     }

     public function mise_a_jourClient($id_clt,$nom,$prenom,$rue,$cp,$localite,$telephone,$email,$pass_clt,$matricule){
         try{
             $query="update client set nom=:nom,prenom=:prenom,rue=:rue,cp=:cp,localite=:localite,telephone=:telephone,email=:email,pass_clt=:pass_clt,matricule=:matricule where id_clt=:id_clt";
             $_resultset = $this->_db->prepare($query);
             $_resultset->bindValue(':id_clt', $id_clt);
             $_resultset->bindValue(':nom', $nom);
             $_resultset->bindValue(':prenom', $prenom);
             $_resultset->bindValue(':rue', $rue);
             $_resultset->bindValue(':cp', $cp);
             $_resultset->bindValue(':localite', $localite);
             $_resultset->bindValue(':telephone', $telephone);
             $_resultset->bindValue(':email', $email);
             $_resultset->bindValue(':pass_clt', $pass_clt);
             $_resultset->bindValue(':matricule', $matricule);
             $_resultset->execute();

         }catch(PDOException $e){
             print $e->getMessage();
         }
     }

     public function ajout_client($nom,$prenom,$rue,$cp,$localite,$telephone,$email,$pass_clt,$matricule){
         try{
             $query="insert into client(nom,prenom,rue,cp,localite,telephone,email,pass_clt,matricule) values ";
             $query.="(:nom,:prenom,:rue,:cp,:localite,:telephone,:email,:pass_clt,:matricule)";
             $_resultset = $this->_db->prepare($query);
             $_resultset->bindValue(':nom', $nom);
             $_resultset->bindValue(':prenom', $prenom);
             $_resultset->bindValue(':rue', $rue);
             $_resultset->bindValue(':cp', $cp);
             $_resultset->bindValue(':localite', $localite);
             $_resultset->bindValue(':telephone', $telephone);
             $_resultset->bindValue(':email', $email);
             $_resultset->bindValue(':pass_clt', $pass_clt);
             $_resultset->bindValue(':matricule', $matricule);
             $_resultset->execute();
         }catch(PDOException $e){
             print $e->getMessage();
         }
     }

     public function DeleteClient($id_clt)
     {
         try {
             $query = "DELETE FROM client WHERE id_clt= :id_clt";
             $_resultset = $this->_db->prepare($query);
             $_resultset->bindValue(':id_clt', $id_clt);
             $_resultset->execute();
         } catch (PDOException $e) {
             print $e->getMessage();
         }
     }
    public function getClient($email,$pass_clt)
     {
         try{
             $query = "select is_client(:email,:pass_clt) as retour";
             $_resultset = $this->_db->prepare($query);
             $_resultset->bindValue(':email',$email);
             $_resultset->bindValue(':pass_clt',$pass_clt);
             $_resultset->execute();
             $retour = $_resultset->fetchColumn(0);
             return $retour;
         }catch (PDOException $e){
             print "Echec ".$e->getMessage();
         }
     }

     public function getAllClients(){
         $query ="select * from client";
         $_resultset = $this->_db->prepare($query);
         $_resultset->execute();

         while($d = $_resultset->fetch()){
             $_data[] = new Client($d);
         }
         return $_data;
     }



 }







