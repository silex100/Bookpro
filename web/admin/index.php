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
     $account->protectAdmin(); // Protege la page Admin
?>
     <main class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                     <aside>
                          <div class="panel panel-primary">
                            <div  class="panel-heading px-heading">INFORMATION SUR LE COMPTE</div>
                            <div class="panel-body">
                                <h5>Bienvenue  <a href="#page"> <?php echo $account->getUser()->getLogin(); ?></a></h5>
                                <p>
                                  <span> Nom Complet: <i><?php   echo $account->getNomComplet(); ?></i></span><br/>
                                  <span> Annees scolaire: <i><?php   echo $account->getUser()->getAnnees(); ?></i></span><br/>
                                  <span> courriel eletronique : <i><?php echo $account->getEmail(); ?></i></span><br/>
                                  <span>Role: <i><?php echo $account->displayUserRole($account->getRole()); ?></i></span><br/>
                               </p>
                            </div>
                         </div>
                     </aside>
                     <aside class="nav-navigation">
                         <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="http://localhost/bookpro/web/Admin/"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Accueil</a></li>
                            <li> <a href="index.php?page=utilisateurs"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Utilisateurs </a></li>
                            <li> <a href="index.php?page=projets"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Projets </a></li>
                            <li><a href="index.php?page=configuration"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Configuration</a></li>
                            <li><a href="http://localhost/bookpro/web/Admin/"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;Help</a></li>
                         </ul>
                     </aside>
                </div>
                <div class="col-xs-12 col-md-8">
                       <?php  Bookpro\Service\Session::flashes();?><!-- Flash Message -->
                       <?php  
                            $page = isset($_REQUEST['page'])?$_REQUEST['page']:'null';
                            switch ($page) {
                                case 'utilisateurs':
                                     $actionEntry = isset($_REQUEST['entry'])?$_REQUEST['entry']:'null';
                                     switch ($actionEntry) {
                                         case 'ajouter':
                                             require(dirname(__FILE__)."\ajouter.php"); 
                                             break;
                                        case 'detail':
                                             require(dirname(__FILE__)."\detail.php"); 
                                             break;
                                         case 'modifier':
                                             require(dirname(__FILE__)."\modifier.php"); 
                                             break;
                                        case 'supprimer':
                                             require(dirname(__FILE__)."\supprimer.php"); 
                                             break;
                                        case 'ajouter_role':
                                             require(dirname(__FILE__)."\ajouter_role.php"); 
                                             break;
                                         default:
                                         require(dirname(__FILE__)."\utilisateurs.php"); 
                                         break;
                                     }
                                     break;
                                case 'projets':
                                     require(dirname(__FILE__)."\projets.php"); 
                                     break;
                                case 'configuration':
                                     require(dirname(__FILE__)."\configuration.php"); 
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