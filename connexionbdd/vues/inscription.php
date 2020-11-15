<?php

function inscription()
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
