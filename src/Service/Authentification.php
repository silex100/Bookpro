<?php

 namespace Bookpro\Service;

 /**
 * @file
 *
 * @package \Bookpro\Service\Authentification
 */

use Bookpro\SessionInterface;
use Bookpro\Service\Session;
use Bookpro\AuthentificationInterface;


 /**
  * class Authentification
  * 
  */
  class Authentification implements AuthentificationInterface
  {
     
      /**
       * @var string| null
       *
       * \Bookpro\SessionInterface;
       */
      private $session; 
      
      /**
       * Constructor
       */
      public function __construct(){
          $this->session = Session::getSession();
         
      }

      /** 
       * Allows connection
       *
       * @param object| null, should contains a param object User.
       */
      public function  authentificat($user){
         if(is_object($user)){
             if(!empty($user->getLogin()) || !empty($user->getEmail())){
                if(!empty($user->getPassword())){
                     $this->session->write('user', $user);
                     switch ($user->getRole()) {
                         case Authentification::ROLE_ADMIN :
                             header("Location: http://localhost/bookpro/web/Admin");
                             break;
                         case Authentification::ROLE_ENSEIGNANT :
                             header("Location: http://localhost/bookpro/web/ensiegnant");
                             break;
                         case Authentification::ROLE_ETUDIANT :
                             header("Location: http://localhost/bookpro/web/etudiant");
                             break;
                         default:
                             header("Location: http://localhost/bookpro");
                            break;
                      } 
                 }else{
                     $this->session->setFlashType('danger','password',"Check up on you password");
                 }
             }else{
                 $this->session->setFlashType('danger','identifiant',"Check up on you login or email");
             }
         }
      }
  }
  