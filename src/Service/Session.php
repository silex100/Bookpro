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
       * Return flash $key
       *
       * @return $key
       */
      public static  function getKey($key){
         if(self::hasKey($key)){
             return $_SESSION[$key];
         }
      }

       /**
       * Return a boolean
       *
       * @param string|null , should contains $type like parameter
       *
       * @return $bool
       */
      public static  function hasKey($key){
          return isset($_SESSION[$key]);
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
      public function write($key, $value){
          $_SESSION[$key] = $value;
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
       * Return flash info
       *
       * @return flash type
       */
      public  static function getFlashesType($type){
          $valeur = $_SESSION['flash'][$type];
          unset($_SESSION['flash'][$type]);
          return $valeur;
      }

      /**
       *
       * @param string | null type d'info [ success, danger, warning, info]
       *
       * @return flash message
       */

       public static function Display($type){
           $html = null;
           if(isset($type)){
               if(Session::hasFlashes($type)){
                   $html.="<div class=\"alert alert-$type\">";
                   $html.="<ul>";
                         foreach(Session::getFlashesType($type) as $flashe_type){
                              $html.="<li>".$flashe_type."</li>";
                         }
                   $html.="</ul>";
                   $html.="</div>";
               }
               echo ($html);
           }
       }

       /**
        * Display Flash by message
        *
        */
      public static function flashes (){
           if(Session::hasFlashes("success")) static::Display("success");
           if(Session::hasFlashes("danger")) static::Display("danger");
           if(Session::hasFlashes("warning")) static::Display("warning");
           if(Session::hasFlashes("info")) static::Display("info");
       }

       /**
        * 
        * Remove variable in session via key
        */
       public static function remove($key){
           unset($_SESSION[$key]);
       }

       /**
        * Put a message Flash
        * @param $key
        * @param $msg
        */
      public function setFlash($key, $message){
          $_SESSION['flash'][$key] = $msg;
      }

      /**
       * Return ALL flash info
       *
       * @return All exists
       */
      public  static function getFlashes(){
         $flash = $_SESSION['flash'];
         unset($_SESSION['flash']);
         return $flash;
      }
}
  