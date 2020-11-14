<?php
include_once __DIR__ . '/Formulaire.php';

function tabEmpaccueil()
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>affichage employé</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 mx-auto d-block">
                    <form class="form-inline form">
                        <fieldset>
                            <legend>PORTAIL:</legend>
                            <a href="profilsession.php?"><button class="btn btn-outline-success" type="button">Accueil</button></a>
                            <a href="service.php"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                            <?php
                            if ($_SESSION['profil'] == 'admin') {
                            ?>
                                <a href="gestion.php?action=ajouter"><button class="btn btn-outline-warning" type="button">Ajouter employé</button></a>
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
                                <th scope="col">noemp</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Emploi</th>
                                <th scope="col">Sup</th>
                                <th scope="col">Embauche</th>
                                <th scope="col">sal</th>
                                <th scope="col">comm</th>
                                <th scope="col">Noserv</th>
                                <th scope="col">Modifier</th>
                                <th scope="col">Supprimer</th>
                                <th scope="col">Détails</th>
                            </tr>
                            <?php

                            //ici je fai sun foreach pour recuperer la table entière, à l'aide de la fonction que j'ai créé dans crud.php, que je receptionne dans un tableau que je parcours à l'aide du foreach
                            $data = new EmployeService();
                            $data = $data->rechercheEmp();
                            $isAdmin = $_SESSION['profil'];
                            afficheTabEmp($data, $isAdmin);
                            ?>
                    </table>
                </div>
            </div>

        </div>
    </body>

    </html>
<?php
}
