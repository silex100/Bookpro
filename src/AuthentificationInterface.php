<?php

/**
 * @file 
 *
 * @package Bookpro\AuthentificationInterface
 */

 namespace Bookpro;

 /**
  * Interface AuthentificationInterface
  */
interface AuthentificationInterface {
    /**
     * Allows to connect
     * 
     * @param $user , should be object User.
     *   
     * @method authentificat($user)
     */
    public function authentificat($user);
}