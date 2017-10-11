            <div class="bookpro">
                <h2>Projets <span class="glyphicon glyphicon-star-empty"></span></h2>
                <form action="" method="get">
                    <fieldset>
                        <legend>Filtre:</legend>
                        <div class="container-fluid">
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="login">Type projet: </label>
                                        <select class=" form-control form-control-lg" name="role">
                                            <option selected value="select">---</option>
                                            <option value="individuel">Individuel</option>
                                            <option value="groupe">Groupe</option>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="login">Date crée: </label>
                                        <input  class="form-control" type="date"  name="date"  placeholder="nom">
                                     </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                     <button type="submit" class="btn btn-primary ">&nbsp;Filtre</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form><br/><br/>
                <div class="table-responsive">
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Type projet</th>
                                <th>Nom complet etudiant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                         <tbody>
                            <tr>
                                <td>1</td>
                                <td>Projet X</td>
                                <td>Individuel</td>
                                <td>Christian Shungu</td>
                                <td>
                                    <a  type="button" class="btn btn-success" role="button">Valider</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Projet Y</td>
                                <td>Individuel</td>
                                <td>Jael Etudiant</td>
                                <td>
                                    <a  type="button" class="btn btn-success" role="button">Valider</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Projet Z</td>
                                <td>Groupe</td>
                                <td>GroupeA, Groupe B,etc..</td>
                                <td>
                                    <a  type="button" class="btn btn-success" role="button">Valider</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php debug($_GET); ?>
            </div>