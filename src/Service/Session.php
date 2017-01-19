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
      public  function setFlash($key, $msg){
          $_SESSION['flash'][$key] = $msg;
      }

      /**
       * Return flash $key
       *
       * @return flash $key
       */
      public static  function getFlashes(){
         $flashes = $_SESSION['flash'];
         unset($_SESSION['flash']);
         return $flashes;
      }

      /**
       * Return a boolean
       *
       * @param string|null , should contains $type like parameter
       *
       * @return $bool
       */
      public static  function hasFlashes($type){
          return isset($_SESSION['flash'][$type]);
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

      /**
       *   Example login
       * 
       *   $_SESSION['flash']['sucess']['login'] = $msg 
       *   $_SESSION['flash']['danger']['login'] = $msg 
       *   $_SESSION['flash']['warning']['login'] = $msg 
       *   $_SESSION['flash']['info']['login'] = $msg
       *
       *   @param type d'info [ success, danger, warning, info]
       *   @param $key
       *   @param $msg
       * 
       */
       public function setFlashType($type, $key, $msg =false){
           $_SESSION['flash'][$type][$key] = $msg;
       }

       /**
        * Return flash type success
        *
        * @return flash success
        */
       public static function getSuccess(){
           $success = $_SESSION['flash']['success'];
           unset($_SESSION['flash']['success']);
           return $success;
       }
      
      /**
       * Return flash danger
       *
       * @return flash danger
       */
      public static function getDanger(){

          $danger = $_SESSION['flash']['danger'];
          unset($_SESSION['flash']['danger']);
          return $danger;
      }

      /**
       * Return flash warning
       *
       * @return flash warning
       */
      public static function getWarning(){
          $warning = $_SESSION['flash']['warning'];
          unset($_SESSION['flash']['warning']);
          return $warning;
      }

      /**
       * Return flash info
       *
       * @return flash info
       */
      public function getInfo(){
          $info = $_SESSION['flash']['info'];
          unset($_SESSION['flash']['info']);
          return $info;
      }


  }
  