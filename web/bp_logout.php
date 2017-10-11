<?php
/**
 * @file 
 * 
 * Contains page logout
 */

/**
 * Require Files is falcultatif
 * @include files
 */
require (__DIR__."/default/overall.php");
require (__DIR__."/default/settings.php");
require(__DIR__."/../vendor/Loader.php");

Bookpro\Loader::register(); // Autoloading
Bookpro\Service\Session::activeSession(); // Active session
Bookpro\Service\Account::logout($_REQUEST); // Log out