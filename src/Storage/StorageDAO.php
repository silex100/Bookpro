<?php

/**
 * @file
 *
 * @package \Bookpro\Storage\StorageDAO
 */
 
namespace Bookpro\Storage;

use Bookpro\Database\Connection;
use Bookpro\Database\DatabaseAbstract;

/**
 * Class  StorageDAO
 *
 */
class StorageDAO extends DatabaseAbstract {

     /**
      * Constructor of Manager
      * 
      * @param \Bookpro\Database\Connection;
      */
     public function __construct(Connection $connection){
         parent::__construct($connection);
     }

     /**
      * Return  User
      * @param  string| null , $login
      * @param  string | null, $email;
      * @param  $string | null, $password;
      * 
      * @return  $array user
      */
     public function getUser($login,$email,$password){
         $sql = 'SELECT * From user WHERE (login =:login or email =:email) and password =:password';
         $array =  array('login'=>$login,'email'=>$email, 'password'=>$password);
         return $this->prepareby($sql,$array);
     }
     

     /**
      * Return array enseignant 
      * @return array enseignant 
      */
     public function getAllEnseignant(){
         return $this->queryAssoc("SELECT * FROM enseignant e , user u WHERE e.user_id=u.id" );
     }

      /**
      * Return array etudiant 
      * @return array etudiant
      */
     public function getAllEtudiant(){
         return $this->queryAssoc("SELECT * FROM etudiant e , user u WHERE e.user_id=u.id" );
     }

     /**
      * Return  $role
      * @return $role
      */
     public function getRole($object){
         if(!empty($object) && is_object($object)){
            $sql = 'SELECT role From user WHERE (login =:login or email =:email) and password =:password ';
            $array =  array('login'=>$object->getLogin(),'email'=>$object->getEmail(), 'password'=>$object->getPassword());
            return $this->prepareby($sql,$array);
         }
     }

     /**
      * Return all array user
      * @return array user 
      */
     public function getAllUser(){
         return $this->queryAssoc("SELECT * FROM  user " ); 
     }

}