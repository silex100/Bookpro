<?php  require(__DIR__."\bp_header.php"); ?>
    <main  class="container-fluid">
        <?php  Bookpro\Service\Session::flashes();?><!-- Flash Message -->
        <div class="row">
            <div class="col-xs-8 col-md-6">
                <article>
                 Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 
                 Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. 
                 Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié.
                 Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
                </article>
            </div>
            <div class="col-xs-8 col-md-6">
                  <div class="form-wrap">
                    <div class="form-wrap-container">
                        <form action="" method="post" >
                            <h4> IDENTIFICATION</h4>
                            <div class="form-group">
                                <label for="login">Identifiant </label>
                                <input  class="form-control" type="text"  name="identifiant"  placeholder="login or email">
                             </div>
                             <div class="form-group">
                                <label for="password">Password </label>
			                    <input  class="form-control" type="password"  name="password">
                             </div>
                            <div class="form-group">
                                <a href="#forget">Mot de passe oublié</a>
                            </div>
                            <input type="hidden" name="bookpro_login_in"  />
                            <button type="submit" class="btn btn-primary">&nbsp;Entrer&nbsp;</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php  require(__DIR__."\bp_footer.php"); ?>
  