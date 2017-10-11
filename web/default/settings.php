<?php

/**
 * @file
 *
 * Bookpro  configuration file
 *
 */

 /**
  *  Database settings
  *
  *  The $databases Constant specifies the database connection.
  *  Here is :
  * 
  * define('DB_ENGINE','mysql');
  * define('DB_HOST','localhost');
  * define('DB_DATABASE','bookpro');
  * define('DB_USER','root');
  * define('DB_PASS', '');
  */
define('DB_ENGINE','mysql');
define('DB_HOST','localhost');
define('DB_DATABASE','bookpro');
define('DB_USER','root');
define('DB_PASS', '');

/**
 * Route major Bookpro
 */
 define('BOOKPRO','bookpro/');

// Route blog
// define('BOOKPRO', getcwd());
