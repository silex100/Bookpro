<?php

/**
 * @file
 *
 * @package \Bookpro\Service\Session
 */

 namespace Bookpro\Service;

 use Bookpro\SessionInterface;

 /**
  * class Session
  */
class Session implements SessionInterface
{
      /**
       * @var $session, should contains  session
       */
      private static $session;

      /**
       * Constructor
       */
      public function __construct(){
          session_start();
      }

      /**
       * Start Session
       */
      public static function getSession(){
          if(!static::$session)static::$session = new self();
		  return static::$session;
      }

      /**
       * Check out  if session is  Active or not, And then it activates if not.$_COOKIE
       */
      public static function activeSession(){
          if (session_status() == PHP_SESSION_NONE) {
              return self::getSession();
          }
      }

      /**
       * Set session Flash
       */
      public static function setFlash($key, $msg){
          $_SESSION['flash'][$key] = $msg;
      }

      /**
       * Return flash $key
       */
      public static function getFlashes(){
         $flashes = $_SESSION['flash'];
         unset($_SESSION['flash']);
         return $flashes;
      }

      /**
       * Return a boolean
       *
       * @param string|null , should contains $key like parameter
       *
       * @return $bool
       */
      public static function hasFlashes($key){
          return isset($_SESSION['flash'][$key]);
      }

      /**
       * Add another variable in Session
       * 
       * @param string | null, should be the key of the our parametre
       * @param string | null , and second parameter like  valeur
       */
      public static function write($key, $value){
          $_SESSION[$key] = $value;
      }

      /** 
       * Return of the value via key
       *
       * @param string | null, should contains $key
       *
       * @return $_SESSION[$key]
       */
      public  static function read($key){
          return isset($_SESSION[$key]) ? $_SESSION[$key]: 'null';
      }
}
  