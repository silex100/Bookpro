<?php

/**
 * @file 
 *
 * @package Bookpro\AuthentificationInterface
 */

 namespace Bookpro;

 use Bookpro\RoleInterface;

 /**
  * Interface AuthentificationInterface
  */
interface AuthentificationInterface extends RoleInterface {
    /**
     * Allows to connect
     * 
     * @param $user , should be object User.
     *   
     * @method authentificat($user)
     */
    public function authentificat($user);
}