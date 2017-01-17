<?php

/**
 * @file
 *
 * @package \Bookpro\Database\Connection
 */

 namespace Bookpro\Database;

 use \PDO;

 /**
  * class Connection
  *
  * @method  __construct()
  *
  */
 class Connection  extends PDO
 {
     /**
      * @var string|null should contains the type engine of conncetion database
      */
     private $engine;

     /**
      * @var string|null should contains the  hostname of conncetion database
      */
     private $hostname;

     /**
      * @var string|null should contains the name database of conncetion database
      */
	 private $database;

     /**
      * @var string|null should contains the username database of conncetion database
      */
	 private $username;

     /**
      * @var string|null should contains the password database of conncetion database
      */
	 private $password;

     public function __construct()
     {
        $this->engine = DB_ENGINE;
        $this->hostname = DB_HOST; 
        $this->database = DB_DATABASE;
        $this->username = DB_USER; 
        $this->password = DB_PASS;
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->hostname; 
        parent::__construct( $dns, $this->username, $this->password);
     }
 }