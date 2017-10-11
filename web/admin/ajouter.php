            
             <div class="bookpro-wrap">
                <h2>Ajouter nouvel Utilisateurs &nbsp;&nbsp;<span class="glyphicon glyphicon-star-empty"></span></h2>
                <div class="well">
                    <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="login">Nom: </label>
                                        <input  class="form-control" type="text"  name="nom"   value="<?php echo Bookpro\Service\Session::getKey('nom');?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="password">Prenom: </label>
                                        <input  class="form-control" type="text"  name="prenom" value="<?php echo Bookpro\Service\Session::getKey('prenom');?>">
                                     </div>
                                </div> 
                            </div>  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="login">Email: </label>
                                        <input  class="form-control" type="email"  name="email" value="<?php echo Bookpro\Service\Session::getKey('email');?>">
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="login">Rôle: </label>
                                        <select class=" form-control form-control-lg" name="role">
                                            <option selected value="0"> </option>
                                            <option value="1">Administrateur</option>
                                            <option value="2">Ensiegnant</option>
                                            <option value="3">Etudiant</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="sign_up_user"  />                             
                            <button type="submit" class="btn btn-primary">&nbsp;Ajouter nouvel utilisateur&nbsp;</button>
                        </div>
                    </form>
                </div>
                <?php 
                    // enregistre new user             
                    $account->enregistre($_POST);
                ?>
             </div>