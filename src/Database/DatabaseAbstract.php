<?php

/**
 * @file
 *
 * @package \Bookpro\Database\DatabaseAbstract
 */

namespace Bookpro\Database;
use \PDO;

/**
 * Class DatabaseAbstract
 */
abstract class DatabaseAbstract
{
     
     /**
      * @var $connection; Should allow connection Mysql, same for all subclasses
      */
      private  $connection;

      /**
       *  Contructor
       */
      public function __construct($connection = false){
          $this->connection = $connection;
      }

       /**
        * Return array array assoc
        * 
        * @param string , $stmt
        */
       public  function queryAssoc($stmt){
           return $this->connection->query($stmt)->fetchAll(PDO::FETCH_ASSOC);
       }

       /**
        * @param statement
        * @param $attibute
        *
        * @return array
        */
       public function prepareBy($stmt, $attribute = []){
           $q = $this->connection->prepare($stmt);
		   $q->execute($attribute);
		   $row = $q->fetch(PDO::FETCH_ASSOC);
           return $row;
       }

      /**
        * Return requete type
        *
        * @param string  , should contains a Statement request.
        * @param class 
        *
        * @return $object type
        */
       public function fetchFromdatabase($stmt, $table){
           return  $this->connection->query($stmt)->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $table);
       }

        /**
        *  Begin Transaction
        */
       public  function beginTransaction(){
			 $this->connection->beginTransaction();
	   }
}