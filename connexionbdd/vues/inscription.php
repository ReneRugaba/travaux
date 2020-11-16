<?php

/**
 * formulaire inscription
 *
 * @return html
 */
function inscription()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <?php head(); ?>

    <body>
        <!-- ce formulaire sert à l'inscription pour la base de donnée utilisateur -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 mx-auto d-block">
                    <form class="needs-validation form" action="execute.php" method="POST">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="email" class="form-control" name="email" placeholder="votre e-mail" required>
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="password" name="password" class="form-control" required placeholder="mot de pass">
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                                <input type="password" name="password2" class="form-control" required placeholder="confirmation mot de passe">
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary col-md-12" type="submit">soumettre</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
