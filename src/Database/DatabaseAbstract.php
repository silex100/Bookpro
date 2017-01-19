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
      * @var $database static; Should allow connection Mysql, same for all subclasses
      */
      private static $database;

      /**
       * @var $table array, Array of tables for subclases
       */
      private static $table = [];

      /**
       *  Contructor
       */
      public function __construct($database = false){
          self::init($database);
      }
     
      /**
       * @method initialize
       */
      public static function init($database=false){if(!($database===false))self::$database=$database;}

       /**
        * @return $database
        */
       public static function getdatabase() { return self::$database; }

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
       public static function fetchFromdatabase($stmt, $table){
           return static::getdatabase()->query($stmt)->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $table);
       }

       /**
        * Return array array assoc
        * 
        * @param string , $stmt
        */
       public static function queryAssoc($stmt){
           return static::getdatabase()->query($stmt)->fetchAll(\PDO::FETCH_ASSOC);
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
           static::getdatabase()->bindValue($parameter, $value, $type);
       }

       /**
        *  Begin Transaction
        */
       public static function beginTransaction(){
			static::getdatabase()->beginTransaction();
	   }

       /**
        * @return array
        */
       public  static function prepareBy($stmt, $value){
           $q = static::getdatabase()->prepare($stmt);
		   $q->execute([$value]);
		   $row = $q->fetch(\PDO::FETCH_ASSOC);
           return $row;
       }
}