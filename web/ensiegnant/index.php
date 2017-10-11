<?php require(dirname(dirname(__FILE__))."\bp_header.php"); ?>
<?php
    /**
     * Liste 
     * @package 
     */
     use Bookpro\SessionInterface;
     use Bookpro\Service\Session;
     use Bookpro\Service\Account;

     // Instanciation
     $account = new Account();
     $account->protectEnseignant(); // Protege la page Enseignant
?>
     <main class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                     <aside>
                          <div class="panel panel-primary">
                            <div class="panel-heading px-heading"> INFORMATION SUR LE COMPTE</div>
                            <div class="panel-body">
                                <h5>Bienvenue  <a href="#page"><?php echo $account->getUser()->getLogin(); ?> </a></h5>
                                <p>
                                  <span> Dernier Connexion: <i><?php  echo $account->getUser()->getAnnees(); ?></i></span><br/>
                                  <span>courriel eletronique : <i><?php echo $account->getUser()-> getEmail(); ?></i></span><br/>
                                  <span>Role: <i><?php echo $account->displayUserRole($account->getRole()); ?> </i></span><br/>
                               </p>
                            </div>
                         </div>
                     </aside>
                     <aside class="nav-navigation">
                         <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="http://localhost/bookpro/web/ensiegnant/"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Accueil</a></li>
                            <li> <a href="index.php?page=projets"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Projects </a></li>
                            <li><a href="http://localhost/bookpro/web/ensiegnant/"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;Help</a></li>
                         </ul>
                     </aside>
                </div>
                <div class="col-xs-12 col-md-8">
                      <?php  
                         $page = isset($_REQUEST['page'])?$_REQUEST['page']:'null';
                         switch ($page) {
                             case 'projets':
                                require(dirname(__FILE__)."\projets.php"); 
                                break;
                             default:
                                  require(dirname(__FILE__)."\main.php"); 
                                break;
                          }
                       ?>
                </div>
            </div>
        </div>
    </main>
<?php  require(dirname(dirname(__FILE__))."\bp_footer.php");?>