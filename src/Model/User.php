<?php

/**
 * @file
 *
 * @package \Bookpro\Model\User
 */
 
 namespace Bookpro\Model;

 use Bookpro\UserInterface;

/**
 * Class User
 *
 */
 class User implements UserInterface
 {
      /**
       * @var int | null , id of the User
       */
      protected $_id ;

      /**
       * @var string| null, login of the User
       */
      protected $_login;

      /**
       * @var string| null, password of the User
       */
      protected $_password;

      /** 
       * @var string | null , role of the User
       */
      protected $_role;

      /** 
       * @var string | null , email of the User
       */
      protected $_email;

      /**
       * Constructor
       */
      public function  __construct(array $data){
         $this->hydrate($data);
      }

      /**
       * Hydrate 
       */
      protected function hydrate(array $data){
          foreach($data as $key=> $value){
              $method ='set'.ucfirst($key);
              if(method_exists($this,$method)){
				 $this->$method($value);
    		  }
          }
      }

      /**
       * Return  the Id of User
       * @return $_id
       */
      public function getId(){
         return $this->_id;
      }
      
      /**
       * Set the id of the User
       * @return  $id
       */
       public function setId($id){
          $this->_id = (int) $id;
       }

      /**
       * Return the login of the User
       * @return $_login
       */
      public function getLogin(){
          return $this->_login;
      }


      /**
       * Set the login of the User
       * @param $login
       */
      public function setLogin($login){
         $this->_login = isset($login)? $login : null;
      }

      /**
       * Return the password of the User
       * @return $_password
       */
      public function getPassword(){
          return $this->_password;
      }
      
      /**
       * Set the password of the User
       * @param $password
       */
      public function setPassword($password){
          $this->_password = isset($password)? $password : null;
      }

      /**
       * Return the role of the User
       * @return $_role
       */
      public function getRole(){
          return $_role;
      }

      /**
       * Set the role of the User
       * @param $_role
       */
      public function setRole($role){
         $this->_role = isset($role)? $role : null;
      }

      /**
       * Return the role of the User
       * @return $_role
       */
      public function getEmail(){
          return $_email;
      }

      /**
       * Set the role of the User
       * @param $_role
       */
      public function setEmail($email){
         $this->_email= isset($email)? $email : null;
      }

      /**
       * Destructor
       */
      public function __destruct(){}
 }