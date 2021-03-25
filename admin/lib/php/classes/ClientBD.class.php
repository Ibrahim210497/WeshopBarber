<?php
 class ClientBD extends Client{

     private $_db;
     private $_array = array();

     public function __construct($db) {
         $this->_db = $db;
     }

     public function addClient($data) {
         //$_db->beginTransaction();
         try {
             $query = "insert into client(nom,prenom,rue,cp,localite,telephone,email,pass_clt)
            values(:nom,:prenom,:rue,:cp,:localite,:telephone,:email,:pass_clt)";
             $resultset = $this->_db->prepare($query);
             $resultset->bindValue(':nom', $data['nom']);
             $resultset->bindValue(':prenom', $data['prenom']);
             $resultset->bindValue(':rue', $data['rue']);
             $resultset->bindValue(':cp', $data['cp']);
             $resultset->bindValue(':localite', $data['localite']);
             $resultset->bindValue(':telephone', $data['telephone']);
             $resultset->bindValue(':email', $data['email']);
             $resultset->bindValue(':pass_clt', $data['pass_clt']);
             $resultset->execute();
             return 1;
         } catch (PDOException $e) {
             print "Echec de l'insertion " . $e->getMessage();
             return 2;
         }
     }

     public function getClient1($pass_clt, $email) {
         try {
             $query = "select * from client where email=:email1 and password=:password";
             $resultset = $this->_db->prepare($query);
             $resultset->bindValue(':email', $email, PDO::PARAM_STR);
             $resultset->bindValue(':password', $pass_clt, PDO::PARAM_STR);
             $resultset->execute();
         } catch (PDOException $e) {
             print $e->getMessage();
         }

         while ($data = $resultset->fetch()) {
             try {

                 $_array[] = $data;
             } catch (PDOException $e) {
                 print $e->getMessage();
             }
         }
         return $_array;
     }

     public function getClient2() {
         try {
             $query = "select * from client";

             $resultset = $this->_db->prepare($query);
             //  $resultset->bindValue(':login', $login);
             //  $resultset->bindValue(':password', $password);
             $resultset->execute();

             while ($data = $resultset->fetch()) {
                 $_array[] = new Client($data);
             }
         } catch (PDOException $e) {
             print $e->getMessage();
         }
         if (!empty($_array)) {
             return $_array;
         } else {
             return null;
         }
     }


 }







