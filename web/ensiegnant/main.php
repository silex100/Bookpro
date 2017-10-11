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