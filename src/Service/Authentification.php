<?php

/**
 * @file
 *
 * @package \Bookpro\Service\Authentification
 */

 namespace Bookpro\Service;

 use Bookpro\Manager\UserManager;
 use Bookpro\SessionInterface;
 use Bookpro\Model\User;
 use Bookpro\AuthentificationInterface;

 /**
  * class Authentification
  * 
  */
  class Authentification implements AuthentificationInterface
  {
      /**
       * Constructor
       */
      public function __construct()
      {
          # code ..
      }

      /** 
       * Allows connection
       *
       * @param object| null, should contains a param object User.
       */
      public function  authentificat($user){
      }
  }
  