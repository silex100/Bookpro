<?php

/**
 * @file
 *
 * @package \Bookpro\UserInterface
 */

 namespace Bookpro;
 
 /**
  * Interface UserInterface
  */
 interface UserInterface
 {
     /**
      *  Return the id of this User
      * 
      *  @return int| null should contains the id of user
      *
      */
     public function getId();

     /**
      * Return the login of this User
      *
      * @return string|null should contains the login of this User.
      */
     public function getLogin();

     /**
      * Set the login  of this User
      * 
      * @param string $login should Add the login User
      *
      * @return \Bookpro\UserInterface
      */
     public function setLogin($login);

     /**
      * Return the password of this User
      *
      * @return string|null should contains the password of this User
      */
     public function getPassword();

     /**
      * Set the password of this User
      *
      * @param string|null should add the password User.
      *
      * @return \Bookpro\UserInterface
      */
     public function setPassword($password);

     /**
      * Return the role of this User
      *
      * @return string|null should contains the role of this User
      */
     public function getRole();

     /**
      * Set the $role of this User
      *
      * @param string| null should add the role of this User
      *
      * @return \Bookpro\UserInterface
      */
     public function setRole($login);

      /**
      * Return the e-mail of this User
      *
      * @return string|null should contains the password of this User
      */
     public function getEmail();

     /**
      * Set the $email of this User
      * 
      * @param string| null sould add the email of this User
      */
     public function setEmail($email); 
 }