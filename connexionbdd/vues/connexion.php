<?php
include_once __DIR__ . '/head.php';
/**
 * formulaire connexion
 *
 * @return html
 */
function connexion()
{
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php head(); ?>

    <body>
        <!-- ce formulaire permet de se coennecter à la base de donnée utilisateurs -->
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4 mx-auto d-block ">
                            <form class="form" action="traitementconnect.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="mot de passe">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary col-12">Soumettre</button>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <?php
                                    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'empty') {
                                        echo 'merci de remplir tous les champs du formulaire de connexion!!';
                                    } elseif (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'erreur') {
                                        echo 'votre mail ou votre mot de passe n\'est pas reconnu. Merci de vous inscrire en suivant ce lien
                            ' ?>
                                        <a href="inscription.php">inscrivez vous ici</a>
                                    <?php ',si cela n\'est pas encore le cas';
                                    } elseif (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'succes') {
                                        echo 'votre inscription a été validé avec succès!';
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
