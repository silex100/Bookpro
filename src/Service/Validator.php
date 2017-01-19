<?php

/**
 * @file
 *
 * @package \Bookpro\Service\Validator;
 */

namespace Bookpro\Service;

use Bookpro\SessionInterface;

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
    public function  __construct($data= [], SessionInterface $session){
        $this->data = $data;
        $this->session = $session;
    }

    /**
     * Return the champs form
     * @param string|null
     * 
     * @return champs
     */
    public  function getField($field){
      if(isset($field) && $this->data[$field] != null){
          return $this->data[$field];
      }
      return false;
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
}
