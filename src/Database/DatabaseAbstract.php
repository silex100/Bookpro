<?php

/**
 * @file
 *
 * @package \Bookpro\Database\DatabaseAbstract
 */

namespace Bookpro\Database;

/**
 * Class DatabaseAbstract
 */
abstract class DatabaseAbstract
{
    /**
     * @var $db static; Should allow connection Mysql, same for all subclasses
     */
     private static $db;

     /**
      * @var $table array, Array of tables for subclases
      */
     private static $table = [];
     
     /**
      * @method initialize
      */
      /* public static function init($classname, $table, $db=false){
          if(!($db===false))self::$db=$db;
          self::$table[$classname] = $table;
      } */

      public static function init($db=false){if(!($db===false))self::$db=$db;}

      /**
       * @return $db
       */
       public static function getDb() { return self::$db; }

       /**
       * @return $table
       */
       public static function getTable($classname) { return self::$table[$classname]; }

       /**
        * Return requete type
        *
        * @param string  , should contains a Statement request.
        * @param class 
        *
        * @return $object type
        */
       public static function fetchFromDB($stmt, $table){
           return static::getDb()->query($stmt)->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $table);
       }

       /**
        * Return array array assoc
        * 
        * @param string , $stmt
        */
       public static function queryAssoc($stmt){
           return static::getDb()->query($stmt)->fetchAll(\PDO::FETCH_ASSOC);
       }

       /**
        * Bind
        */
       public function bind($param, $value, $type= null){
           if(is_null($type)){
               switch (true) {
                case is_bool($value):
                     	 $type = \PDO::PARAM_BOOL;
						 break;
                case is_int($value):
                         $type = \PDO::PARAM_INT;
						 break;
                case is_null($value):
						 $type = \PDO::PARAM_NULL;
						break;
				 default:
                        $type = \PDO::PARAM_STR;
                }
           }
           static::getDb()->bindValue($parameter, $value, $type);
       }

       /**
        *  Begin Transaction
        */
       public static function beginTransaction(){
			static::getDb()->beginTransaction();
	   }

       /**
        * @return array
        */
       public  static function prepareBy($stmt, $value){
           $q = static::getDb()->prepare($stmt);
		   $q->execute([$value]);
		   $row = $q->fetch(\PDO::FETCH_ASSOC);
           return $row;
       }
}