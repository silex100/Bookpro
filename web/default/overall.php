<?php

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
        echo '<pre>'.print_r($lists[$i], true).'</pre>';
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
