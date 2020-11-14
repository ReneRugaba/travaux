<?php

function tabServiceAccueil()
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 mx-auto d-block">
                    <form class="form-inline form">
                        <fieldset>
                            <legend>PORTAIL:</legend>
                            <a href="profilsession.php"><button class="btn btn-outline-success" type="button">Accueil</button></a>
                            <a href="gestion.php"><button class="btn btn-outline-primary" type="button">Tableau employés</button></a>
                            <?php
                            if ($_SESSION['profil'] == 'admin') {
                            ?>
                                <a href="service.php?action=ajouter"><button class="btn btn-outline-warning" type="button">Ajouter service!!</button></a>
                            <?php
                            }
                            ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Numero service</th>
                                <th scope="col">Service</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                                <th scope="col">Détails</th>
                            </tr>
                            <?php
                            //ici je fai sun foreach pour recuperer la table entière, à l'aide de la fonction que j'ai créé dans crudnoserv.php, que je receptionne dans un tableau que je parcours à l'aide du foreach
                            $data = new ServiceService();
                            $data = $data->afficheServ();
                            $isAdmin = $_SESSION['profil'];
                            afficheTabServ($data, $isAdmin);
                            ?>
                    </table>

                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
