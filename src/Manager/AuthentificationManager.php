<?php

/**
 * @file
 *
 * @package \Bookpro\Manager\AuthentificationManager
 */

 namespace Bookpro\Manager;

 use Bookpro\AuthentificationInterface;


/**
 * Class AuthentificationManager
 */
 class AuthentificationManager 
 {
     
     public function __construct()
     {
         # code...
     }

     public function authentificate(AuthentificationInterface $authentification, $user){
         return $authentification->authentificate($user);
     }
 }
 