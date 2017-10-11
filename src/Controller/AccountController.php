<?php

 namespace Bookpro\Controller;

/**
 * @file
 *
 * @package \Bookpro\Controller\AccountController
 */

 use Bookpro\Controller\Controller;

 class AccountController extends Controller{

     /**
      * @var $account , Bookpro\Service\Account;; 
      */
      protected  $account;

     /**
      * Constructor of controller
      * 
      * @param $actionArray
      */
     public function __construct($actionArray= []){
         parent::__construct($actionArray);
     }

     /**
      * Display all page
      */
     public function display(){
         switch ($this->action) {
             case 'utilisateurs':
                 # code...
                 break;
             default:
                 # code...
                 break;
         }
     }

     /**
      * log in
      */
     public function login(){
         return $this->action;
     }

 }
      

