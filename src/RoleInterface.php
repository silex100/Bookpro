<?php

namespace Bookpro;

/**
 * @file 
 *
 * @package Bookpro\RoleInterface
 */

 /**
  * AccountInterface
  */
interface RoleInterface{

     /**
      * Constant Etudaint 
      */
     const ROLE_ADMIN = 1;

     /**
      * Constant Enseignant
      */
     const ROLE_ENSEIGNANT = 2;

     /**
      * Constant Enseignant Admin
      */
     const ROLE_ETUDIANT = 3;
}