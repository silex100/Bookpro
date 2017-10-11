<?php

 namespace Bookpro;

/**
 * @file
 *
 * @package \Bookpro\BuildUserMangerFactory
 */
use Bookpro\Database\Connection;
use Bookpro\Storage\StorageDAO;
use Bookpro\Manager\EnseignantManager;
use Bookpro\Manager\EtudiantManager;

 /**
  * Classe BuildUserMangerFactory
  */
class BuildUserMangerFactory implements  BuildInterface{
     
     /**
      * Return user
      *
      * @param  string| null , $login
      * @param  string | null, $email;
      * @param  $string | null, $password;
      * 
      * @return  $array user
      */
     public function getUser($login = null, $email =null,$password){
         return $this->getStorageDAO()->getUser($login, $email,$password);
     }

     /**
      * @param $array
      *
      * @return User
      */
     public function createUser($array = [], $type = 1){}

     /**
      * @param $type
      *
      * @return User Manager
      */
     public function createUserManager($type=1){
         if(ROLE_ADMIN === $type || ROLE_ENSEIGNANT ===$type){
             return new EnseignantManager($this->getStorageDAO());
         }elseif(ROLE_ETUDIANT === $type){
             return new EtudiantManager($this->getStorageDAO());
         }else{
             return object();
         }
     }

     public function role($object){
         return $this->getStorageDAO()->getRole($object);
     }

     /**
      * @return Bookpro\Storage\StorageDAO;
      */
     private function getStorageDAO(){
         return new StorageDAO(new Connection());
     }

     /**
      * Return all user
      *
      * @return all user
      */
     public function getAllUser(){
         return  $this->getStorageDAO()->getAllUser();
     }
}