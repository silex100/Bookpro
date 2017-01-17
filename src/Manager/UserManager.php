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

 /**
  * Class UserManager
  */
 class UserManager extends DatabaseAbstract
 {
     /**
      * @var string|null , should containts \Bookpro\Database\Connection;
      */
     private $connection;

     public function __construct(Connection $connection)
     {
         $this->connection = $connection;
         parent::init($this->connection);
     }

     public function  getAllUsers(){
         $users_tab = [];
         $users = parent::queryAssoc("select * from user" );
         return $users;
         foreach($users as $user){
            $users_tab[] = new User($user);
         }
         return $users_tab;
     }

     public function chooseUserBylogin($login){
          $user = parent::prepareBy('SELECT * From user where login=?', $login);
          $user = is_array($user) ? $user : [];
          return new User($user);
     }

     public function haslogin($login){
         if(isset($login)){
            $user = $this->chooseUserBylogin($login);
            if($user->getLogin() === $login)return true;
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


 }
 