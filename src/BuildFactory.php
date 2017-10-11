<?php

 namespace Bookpro;

/**
 * @file
 *
 * @package \Bookpro\BuildFactory
 */

 use Bookpro\BuildUserFactory;
 use Bookpro\BuildUserManagerFactory;

 /**
  * Classe BuildFactory
  */
class BuildFactory{

    public function getUserFactory(){
        return new BuildUserFactory();
    }

    public function getUserManagerFactory(){
        return new BuildUserMangerFactory();
    }
}