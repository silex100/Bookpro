<?php

use Bookpro\SessionInterface;
use Bookpro\Service\Session;
/**
 * @file
 *
 * Contains overall.php
 *
 * This file  should be contains the action global
 */

 /**
  * Return the variable a debug
  *
  * @param  $variable, should be array , object, etc..
  */
function debug(){
    $numargs = func_num_args(); // le nombre d'arguments passe en paramettre
    $lists = func_get_args(); // Array arguments.
    $i = 0;
    while($i< $numargs){
        echo '<div class="alert alert-success"><pre>'.print_r($lists[$i], true).'</pre></div>';
        $i++;
    }
}

/**
 * Return nombre the file is in page 
 *
 * @param array
 */
function files_include($files = array()){
    $fileArry = [];
    foreach ($files as $filename) { 
    	$fileArry[] = $filename;
	}
    return $fileArry;
}

/**
 * Return url 
 */
function _get_base_url(){
    //$protocol = ($_SERVER['HTTPS'] && ($_SERVER['HTTPS'] !="off")) ? "https": "http";
    $protocol = !empty($_SERVER['HTTPS']) ? "https": "http";
    return $protocol."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

/**
 * Log out 
 */
function __Logout($action){
   $action  = !empty($action['action'])? $action['action'] : null;
   if($action == "logout"){
      Session::remove('user');
       header('Location: http://'.$_SERVER['HTTP_HOST'].'/bookpro');
       exit();
   }
}

/**
 * Proctection de page 
 */
function __ProctectPage(){
    if(empty(Session::getKey('user'))){
       header("Location: http://localhost/bookpro/");
    }
}


/**
 * Link facultatif
 * 
 *  Url  admin/create.php
 *  etc.
 */
$ActionUsers = [ 
	'create' =>'Create.php',
	'remove' =>'Remove.php',
    'edit'   => 'Edit.php',
	'read'   => 'Show.php',
	'detail' => 'detail.php'
];

$ActionProjects = [
    'create' =>'Create.php',
	'remove' =>'Remove.php',
    'edit'   => 'Edit.php',
	'read'   => 'Show.php',
	'detail' => 'detail.php'
];

