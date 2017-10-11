<?php 

/**
 * @file 
 * 
 * Contains page web
 */


 /**
 * Require Files is falcultatif
 * @include files
 */
require_once (__DIR__."/default/overall.php");
require_once(__DIR__."/default/settings.php");
require_once(__DIR__."/../vendor/Loader.php");


/**
 * Action et instancie
 */
Bookpro\Loader::register(); // Autoloading
Bookpro\Service\Session::getSession(); // start Session

Bookpro\Service\Account::login($_REQUEST); // Connect to account
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookpro</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="http://localhost/bookpro/public/bookpro.css">
     <link rel="stylesheet" href="http://localhost/bookpro/public/bookpro.font.css">
    

    <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

   <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
   <div class="layout-bookpro">
     <header class="container-fluid">
           <nav class="navbar navbar-light navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                       </button>
                      <a id="titre-header" class="navbar-brand" href="#">SYSTEME A REPERTOIRE DE PROJET SCOLAIRE</a>
                    </div>
                    <?php  if(Bookpro\Service\Session::hasKey('user')): ?>
                    <div class="collapse navbar-collapse" id="myNavbar" >
                         <ul class="nav navbar-nav navbar-right">
                            <li><a href="#myPage"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;PROFIL</a></li>
                            <li><a href="#band"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;HELP</a></li>
                            <li><a href="http://localhost/bookpro/web/bp_logout.php?action=logout"><span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;QUITTER</a></li>
                         </ul>
                    </div>
                    <?php  endif; ?>
                </div>
           </nav>
       </header>