<?php

 namespace Bookpro\Controller;

/**
 * @file
 *
 * @package \Bookpro\Controller\Controller
 */

  use Bookpro\Service\Account;

 abstract class  Controller{
     /**
      * @var $action   
      */
      protected  $action;

     /**
      * Constructor of controller
      * 
      * @param $actionArray
      */
     public function __construct($actionArray= []){
         $this->action = isset($actionArray['page'])? $actionArray['page'] : 'null';
     }
 }
