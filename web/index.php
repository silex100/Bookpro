<?php

/**
 * @file 
 * 
 * Contains page web
 */

 use Bookpro\Database\Connection;
 use Bookpro\Database\DatabaseAbstract;
 use Bookpro\Manager\UserManager;
 use Bookpro\Model\User;
 use Bookpro\UserInterface;
 use Bookpro\SessionInterface;
 use Bookpro\Service\Authentification;
 use Bookpro\Service\Session;
 use Bookpro\Service\Validator;

require "default/overall.php";
require "default/settings.php";
require "./src/Database/Connection.php";
require "./src/Database/DatabaseAbstract.php";
require "./src/Manager/UserManager.php";
require "./src/UserInterface.php";
require "./src/AuthentificationInterface.php";
require "./src/Service/Authentification.php";
require "./src/SessionInterface.php";
require "./src/Model/User.php";
require "./src/Service/Session.php";
require "./src/Service/Validator.php";


$included_files = get_included_files();
// debug(files_include($included_files));

$manager = new UserManager(new Connection());
$user = $manager->getAllUsers();

$session = Session::getSession();
$validator = new Validator($_POST,$session);

if(!empty($_POST) && extract($_POST) ){
  // Should write the $key identifiant not value $_POST['identifiant']
  if($validator->isIdentifiant('identifiant')){ 
      if($validator->isPassword('password')){

         $login = ($validator->isLogin('identifiant') == true)? $validator->getField('identifiant') : null ;
         $email = ($validator->isEmail('identifiant') ==true) ? $validator->getField('identifiant') : null;
         $password = ($validator->isPassword('password') == true) ? $validator->getField('password') : null;

         $tablleUser = array(
            "login"=> $login,
            "email"=> $email,
            "password" => $password,
         );
         $user = new User($tablleUser);
        debug($user);
     }
  }
}

// debug($validator->isPassword('password'));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <div class="layout">
    <header></header>
    <main>
        <div class="form-wrap">
            <div class="alert alter-success"> <!-- start Flash success -->
                <?php if(Session::hasFlashes('success')) : ?>
                     <p> You  operations was executed width success.</p>
                     <ul>
                        <?php  foreach(Session::getSuccess() as $success): ?>
                          <li><?= $success;?></li>
                        <?php endforeach;?>
                     </ul>
                <?php endif; ?>
            </div> <!-- The end Flash success -->
            <div class="alert alert-danger"> <!-- start Flash Danger -->
                <?php if(Session::hasFlashes('danger')) : ?>
                     <p> You don't fill right this field.</p>
                     <ul>
                        <?php  foreach(Session::getDanger() as $danger): ?>
                          <li><?= $danger;?></li>
                        <?php endforeach;?>
                     </ul>
                <?php endif; ?>
            </div> <!-- The end Flash Danger -->
            <div class="alert alert-warning"> <!-- start Flash Warning -->
                 <?php if(Session::hasFlashes('warning')) : ?>
                     <p> Warning.</p>
                     <ul>
                        <?php  foreach(Session::getWarning() as $warning): ?>
                          <li><?= $warning;?></li>
                        <?php endforeach;?>
                     </ul>
                <?php endif; ?>
            </div> <!-- The end Flash warning -->
            <div class="alert alert-info">  <!-- The end Flash info -->
                <?php if(Session::hasFlashes('info')) : ?>
                     <p> Info.</p>
                     <ul>
                        <?php  foreach(Session::getInfo() as $info): ?>
                          <li><?= $info;?></li>
                        <?php endforeach;?>
                     </ul>
                <?php endif; ?>
            </div> <!-- The end Flash info -->
            <div class="form-content" id="form-login">
                <h3>Login</h3>
                <form action="" method="post">
                    <div class="field">
                        <label for="login">Login or Email </label>
			     	    <input type="text"  name="identifiant">
                    </div>
                    <div class="field">
                         <label for="password">Password </label>
			             <input type="password"  name="password">
                    </div>
                    <div class="field field-btn">
			             <button type="submit"  class="in">sign in</button>
		            </div>
                 </form>
             </div>
         </div>
    </main>
    <footer></footer>
  </div>
</body>
</html>