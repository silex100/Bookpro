
             <div class="bookpro-wrap">
                         <h2>Utilisateurs <span class="glyphicon glyphicon-star-empty"></span></h2>
                         <ul  class="nav nav-tabs" >
                             <li class="active"><a data-toggle="tab" href="#listes">Lites</a></li>
                             <li><a data-toggle="tab" href="#roles">Roles</a></li>
                         </ul>
                         <div class="tab-content">
                            <div id="listes" class="tab-pane fade in active">
                                <div class="container-table">
                                    <div class="btn-ajouter">
                                         <h3><a href="?page=utilisateurs&entry=ajouter"> <span class="btn"> <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Ajouter nouvel utilisateur</span></a></h3>
                                    </div>
                                    <div class="block-table">          
                                         <table class="table table-bordered">
                                             <thead>
                                              <tr>
                                                <th>#</th>
                                                <th>Login</th>
                                                <th>Role</th>
                                                <th>Nom Complet</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                               </tr>
                                             </thead>
                                             <tbody>
                                               <?php $i = 0;
                                                foreach($account->getAllUser() as $user):
                                                $i++;
                                               ?>
                                               <tr>
                                                <td><?= $i ?></td>
                                                <td><?=  $user->getLogin()?></td>
                                                <td><?=  $account->displayUserRole($user->getRole());?></td>
                                                <td><?= ucfirst($user->getPrenom()).' '.$user->getNom(); ?></td>
                                                <td><?=  $user->getEmail()?></td>
                                                <td>
                                                    <a href="?page=utilisateurs&entry=modifier" type="button" class="btn btn-success" role="button">Modifier</a>
                                                    <a href="?page=utilisateurs&entry=supprimer" type="button" class="btn btn-danger" role="button">Supprimer</a>
                                                </td>
                                             </tr>
                                             <?php endforeach; ?>
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="roles" class="tab-pane fade">
                                <div class="well well-sm">
                                    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.<br/>
                                     Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.<br/>
                                     Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.</p>
                                </div>
                                <div class="btn-ajouter">
                                         <h3><a href="?page=utilisateurs&entry=ajouter_role"> <span class="btn"> <i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Ajouter Rôle</span></a></h3>
                                 </div>
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                             <th>Description</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <tr>
                                            <td>Administrateur(Enseignant)</td>
                                            <td>Détail(1 et 2)</td>
                                         </tr>
                                         <tr>
                                            <td>Enseignant</td>
                                            <td>Détail (2)</td>
                                        </tr>
                                        <tr>
                                             <td>Etudiant</td>
                                             <td>Détail(3)</td>
                                         </tr>
                                         </tbody>
                                </table>
                            </div>
                         </div>
                     </div>
                     
                