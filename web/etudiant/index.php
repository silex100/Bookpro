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
     $account->protectEtudiant(); // Protege la page Etudiant
?>
     <main class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                     <aside>
                          <div class="panel panel-primary">
                            <div class="panel-heading px-heading">INFORMATION SUR LE COMPTE</div>
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
                            <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Accueil</a></li>
                            <li> <a href="#"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Projects </a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;Help</a></li>
                         </ul>
                     </aside>

                </div>
                <div class="col-xs-12 col-md-8">
                     <div class="bookpro-wrap">
                         <div class="row">
                            <div class="col-sm-4">
                               <div class="panel panel-default">
                                   <div class="panel-heading"><span class="glyphicon glyphicon-user">&nbsp;Profil</span></div>
                                   <div class="panel-body">
                                       <h5><a href="#" class="underligne-bookpro"><span class="glyphicon glyphicon-circle-arrow-right"> Paramètre profil</span></a></h5>
                                       <p> Modifier  votre profil</p>
                                   </div>
                               </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-default">
                                   <div class="panel-heading"><span class="glyphicon glyphicon-envelope">&nbsp;Message</span></div>
                                   <div class="panel-body">
                                       <h5><a href="#" class="underligne-bookpro"><span class="glyphicon glyphicon-circle-arrow-right"> Paramètre message</span></a></h5>
                                       <p> Lire, Ecrire, Supprimer votre message</p>
                                   </div>
                               </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-default">
                                   <div class="panel-heading"><span class="glyphicon glyphicon-eye-open">&nbsp;New User</span></div>
                                   <div class="panel-body">
                                       <h5><a href="#" class="underligne-bookpro"><span class="glyphicon glyphicon-circle-arrow-right">&nbsp;New User</span></a></h5>
                                       <p>Voir les nouveaux utilisateurs </p>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <?php debug($account->getUser()); ?>
                            </div>
                            <div class="col-sm-4">
                                <?php debug($account->getUser()); ?>
                            </div>
                            <div class="col-sm-4">
                                <?php debug($account->getUser()); ?>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </main>
<?php  require(dirname(dirname(__FILE__))."\bp_footer.php");?>