<?php

/**
 * @file
 *
 * @package \Bookpro\Manager\UserManager
 */

 namespace Bookpro\Manager;

 use Bookpro\Database\DatabaseAbstract;
 use Bookpro\Database\Connection;
 use Bookpro\Model\User;
 use Bookpro\UserInterface;
 /**
  * Class UserManager
  */
 class UserManager extends DatabaseAbstract
 {
     
     /**
      * Constructor 
      * 
      * @param \Bookpro\Database\Connection;
      */
     public function __construct(Connection $connection){
         parent::__construct($connection);
     }
    
     /**
      * Return all object user 
      */
     public function  getAllUsers(){
         $users_tab = [];
         $users =  $this->queryAssoc("select * from user" );
         foreach($users as $user){
            $users_tab[] = new User($user);
         }
         return $users_tab;
     }

     /**
      * Return All array users 
      * @return array user
      */
     public function findAll(){
         return $this->queryAssoc("select * from user" );
     }

     /**
      * Return one element by id 
      *
      * @param  integer| null , $id
      */
     public function find($id = null){
         if(!empty($id)){
             return $this->prepareby('SELECT id, login, password, role, email From user WHERE id =:id',array('id'=>$id));
         }
     }
    


     public function chooseUserBylogin($login){
          $user = $this->prepareBy('SELECT * From user where login=?', array($login));
          $user = is_array($user) ? $user : [];
          return new User($user);
     }
     public function chooseUserByPassword($password){
          $user = parent::prepareBy('SELECT * From user where password=?',array($password));
          $user = is_array($user) ? $user : [];
          return new User($user);
     }
     public function chooseUserByEmail($email){
          $user = parent::prepareBy('SELECT * From user where email=?',array($email));
          $user = is_array($user) ? $user : [];
          return new User($user);
     }

     /**
      * @param string| null
      *
      * @return $boolean
      */
     public function hasLogin($login){
         if(!empty($login)){
            $user = $this->chooseUserBylogin($login);
            if($user->getLogin() === $login)return true;
            else return false;
         }
         return false;
     }

     /**
      * @param string|null 
      *
      * @return $boolean
      */
     public function hasPassword($password){   
         if(isset($password)){
            $user = $this->chooseUserByPassword($password);
            if($user->getPassword() === $password)return true;
            else return false;
         }
         return false;
     }

      /**
      * @param string|null 
      *
      * @return $boolean
      */
     public function hasEmail($email){
         if(isset($email)){
            $user = $this->chooseUserByEmail($email);
            if($user->getEmail() === $email)return true;
            else return false;
         }
         return false;
     }

     /**
      * Return the number User 
      * 
      * @return $number
      */
     public function count(){
         return count($this->getAllUsers());
     }

     /**
      * Create à user
      */
     public function create(UserInterface $user){
     }
 }
 