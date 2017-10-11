<?php

 namespace Bookpro;

/**
 * @file
 *
 * @package \Bookpro\BuildUserFactory
 */

 use Bookpro\Model\Enseignant;
 use Bookpro\Model\Etudiant;

 /**
  * Classe BuildUserFactory
  */
class BuildUserFactory implements  BuildInterface{

     /**
      * Return user
      *
      * @param  string| null , $login
      * @param  string | null, $email;
      * @param  $string | null, $password;
      * 
      * @return  $array user
      */
     public function getUser($login = null, $email =null,$password){}

    /**
      * @param $array
      *
      * @return User
      */
     public function createUser($array = [], $type = 1){
         if(BuildUserFactory::ROLE_ADMIN === $type || BuildUserFactory::ROLE_ENSEIGNANT===$type){
            return new Enseignant($array);
         }elseif(BuildUserFactory::ROLE_ETUDIANT === $type){
            return new Etudiant($array);
         }
     }

      /**
      * @param $type
      *
      * @return User Manager
      */
     public function createUserManager($type=1){}
}