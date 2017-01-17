<?php

/**
 * @file
 *
 * @package \Bookpro\SessionInterface
 */

 namespace Bookpro;

 /**
  * Interface SessionInterface
  */
interface SessionInterface
{
    /**
     * Create Session
     * 
     *  @return string|null should create session in page.
     */
    public static function getSession();

    /**
     * Return the array Flash
     *
     * @return array Flash
     */
    public static function getFlashes();

   /**
    * Set a message to the message Flash
    *
    * @param $key
    * @param $msg
    */
   public static function setFlash($key, $msg);

   /** 
    * Varify if the key flahs exist
    * 
    * @param $key
    */
   public static function hasFlashes($key);
}
