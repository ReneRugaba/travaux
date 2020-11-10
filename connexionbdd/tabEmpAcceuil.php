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
                        <a href="service.php?action=ajouter"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
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
                <div class="container-fluid">
                    <div class="col-6 rounded mx-auto d-block">
                        <!-- ce formulaire gere les ajouts et les modifications de mannière inteligente grâce l'action du get -->
                        <?php
                        if ($_SESSION['profil'] == 'admin') {
                        ?>
                            <form action="gestion.php?action=<?php if ($_GET['action'] == 'modif') {
                                                                    echo "edit";
                                                                } else {
                                                                    echo "ajouter";
                                                                }
                                                                ?>" class="form" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <!-- pour chanque value du form j'echo les infos à modifier si dans le get action==modif dans le cas contraire, le placeholder remplace les values -->
                                        <input type="text" class="form-control" id="noemp" name="noemp" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                    echo $noemp;
                                                                                                                }
                                                                                                                ?>" placeholder="numero d'employé">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="nom" name="nom" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $nom;
                                                                                                            } ?>" placeholder="nom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                    echo $prenom;
                                                                                                                } ?>" placeholder="prenom">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="emploi" name="emploi" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                    echo $emploi;
                                                                                                                } ?>" placeholder="emploi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sup" name="sup" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                            echo $sup;
                                                                                                        } ?>" placeholder="sup">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date embauche:</label>
                                    <input type="date" class="form-control" id="date" name="embauche" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                    echo $embauche;
                                                                                                                } ?>" placeholder="embauche">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sal" name="sal" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                            echo $sal;
                                                                                                        } ?>" placeholder="salaire">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="comm" name="comm" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $comm;
                                                                                                            } ?>" placeholder="commission">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="noserv" name="noserv" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                    echo $noserv;
                                                                                                                } ?>" placeholder="numero de service">
                                </div>
                                <?php
                                if ($_SESSION['profil'] == 'admin') {
                                ?><button type="submit" class="btn btn-primary">Modiffier/Ajouter</button><?php
                                                                                                        }
                                                                                                            ?>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>