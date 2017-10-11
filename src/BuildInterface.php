<?php

 namespace Bookpro;

/**
 * @file
 *
 * @package \Bookpro\BuildInterface
 */

 use Bookpro\RoleInterface;

 /**
  * Interface BuildInterface
  */
 interface BuildInterface extends RoleInterface
 {
     /**
      * Constant Etudaint 
      */
     const ETUDIANT = 3;

     /**
      * Constant Enseignant
      */
     const Enseignant_Simple = 2;

     /**
      */
     const Enseignant_Admin = 1;


     /**
      * Return user
      *
      * @param  string| null , $login
      * @param  string | null, $email;
      * @param  $string | null, $password;
      * 
      * @return  $array user
      */
     public function getUser($login = null, $email =null,$password);

     /**
      * @param $array
      * @param $type
      *
      * @return User
      */
     public function createUser($array = [], $type = 1);

     /**
      * @param $type
      *
      * @return User Manager
      */
     public function createUserManager($type=1);
 }