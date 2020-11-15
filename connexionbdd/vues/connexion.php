<?php

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

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>

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
