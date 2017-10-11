<?php

/**
 * @file
 *
 * @package \Bookpro\Service\Validator;
 */

namespace Bookpro\Service;

use Bookpro\SessionInterface;
use Bookpro\Model\User;
use Bookpro\BuildFactory;

/**
 * Class Validator
 */
class Validator{

    /**
     * @var $data
     */
    private $data;

    /**
     * @var $session  
     */
    private $session;

    /**
     * Constructor
     */
    public function  __construct($data= []){
        $this->data = $data;
        $this->session = Session::getSession();
    }

    /**
     * Return the champs form
     * @param string|null
     * 
     * @return champs
     */
    private  function getField($field){
      if(isset($field) && $this->data[$field] != null){
          return $this->data[$field];
      }
      return false;
    }

    /**
     *  Verifier si le champs n'est pas vide
     *  @param $field
     */
    public function isField($field){
        if(empty($this->getField($field))){
            return false;
        }
        return true;
    }

    /**
     * Check out the login 
     * @param $key array
     */
    public function isLogin($field){
        if((empty($this->getField($field)) && strlen($this->getField($field))<3) || $this->isEmail($field) == true){
            return false;
        }
        return true;
    }

    /**
     * Check out the email and put flash message
     * @param $key array
     */
    public function isEmail($field){
        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL) || empty($this->getField($field))) {
            return false;
        }
		return true;
    }

    /**
     * Check out the password and put flash message
     * @param $key array
     */
    public function isPassword($field){
         if(strlen($this->getField($field))<5 || empty($this->getField($field))){
            $this->session->setFlashType('danger','password', "Your password is not valide.");
            return false;
        }
        return true;
    }

    /**
     * Check out the password and put flash message
     * @param $key array
     */
    public function isIdentifiant($identifiant){
        if($this->isLogin($identifiant) || $this->isEmail($identifiant)){
            return true;
        }
        $this->session->setFlashType('danger','identifiant', "Please put your email or your login.");
        return false;
    }

    /**
     * Valide login or email and password 
     * 
     * Return new User
     *
     * @return User 
     */
    public function ObjectUseConnect(){
        $objectUser = null;
        if(!empty($_POST) && extract($_POST) ){
            if($this->isIdentifiant('identifiant')){
                 if($this->isPassword('password')){
                     $login = ($this->isLogin('identifiant') == true)? $this->getField('identifiant'): null ;
                     $email = ($this->isEmail('identifiant') ==true) ? $this->getField('identifiant'): null;
                     $password = ($this->isPassword('password') == true) ? $this->getField('password'): null;
                     
                     $factory = new BuildFactory();
                     $arrayUser = $factory->getUserManagerFactory()->getUser($login,$email,$password);
                     if(!empty($arrayUser)){
                        $role = (int) $arrayUser['role'];
                        $objectUser = $factory->getUserFactory()->createUser($arrayUser,$role);
                     }else{
                         $this->session->setFlashType('danger','identifiant', "The information entered is incorrect..");
                     }
                 }
            }
        }
        return $objectUser;
    }

    /**
     *  Retourne nouvel utilisateur valide
     *  
     */
  

    public function  newObectUser(){
        if($this->isField('nom')){ 
            if($this->isField('prenom')){ 
                if($this->isEmail('email')){ 
                    $this->session->write('email',$this->getField('email'));
                }else{
                    $this->session->setFlashType('danger','nom', "Le champ email est vide");
                    $this->session->write('nom',$this->getField('nom'));
                    $this->session->write('prenom',$this->getField('prenom'));
                }
            }else{
                $this->session->setFlashType('danger','nom', "Le champ Prenom est vide");
                $this->session->write('nom',$this->getField('nom'));
            }
        }else{
            $this->session->setFlashType('danger','nom', "Le champ Nom est vide");
        }

     
       

        
        

    
        
    }

    public function __destruct(){}
}
