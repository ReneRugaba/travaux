<?php
include("crud.php");



if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajouter') { //je verifie si le tableau $_POST est vide et si dans le GET[action]==ajouter
    if (isset($_POST['num_employe']) && !empty($_POST['num_employe']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) { //Si la vetrification est ok je verifit si dans le post num_employe  et num_service existe et qu'il ne sont pas vide

        //je recupere chaque element du post dans des variables en anticipant les valeurs vide en leu donnant une valeur NULL
        $num_employe = $_POST['num_employe'];
        $nom = $_POST['nom'] ? "'" . $_POST['nom'] . "'" : 'NULL';
        $prenom = $_POST['prenom'] ? "'" . $_POST['prenom'] . "'" : 'NULL';
        $emp = $_POST['emploi'] ? "'" . $_POST['emploi'] . "'" : 'NULL';
        $sup = $_POST['sup'] ? "'" . $_POST['sup'] . "'" : 'NULL';
        $embauche = $_POST['embauche'] ? "'" . $_POST['embauche'] . "'" : 'NULL';
        $salaire = $_POST['salaire'] ? "'" . $_POST['salaire'] . "'" : 'NULL';
        $commission = $_POST['commission'] ? "'" . $_POST['commission'] . "'" : 'NULL';
        $noserv = $_POST['noserv'];


        //ici je fait appel à la foction add que j'ai créé dans crud.php ui s'occupe de rajouter les infos dans les variable dans la tab employe
        $data = add($num_employe, $nom, $prenom, $emp, $sup, $embauche, $salaire, $commission, $noserv);
    }
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_POST['num_employe'];

    $nom = $_POST['nom'] ? "'" . $_POST['nom'] . "'" : 'NULL';
    $prenom = $_POST['prenom'] ? "'" . $_POST['prenom'] . "'" : 'NULL';
    $emp = $_POST['emploi'] ? "'" . $_POST['emploi'] . "'" : 'NULL';
    $sup = $_POST['sup'] ? "'" . $_POST['sup'] . "'" : 'NULL';
    $embauche = $_POST['embauche'] ? "'" . $_POST['embauche'] . "'" : 'NULL';
    $salaire = $_POST['salaire'] ? "'" . $_POST['salaire'] . "'" : 'NULL';
    $commission = $_POST['commission'] ? "'" . $_POST['commission'] . "'" : 'NULL';


    $data = edit($id, $nom, $prenom, $emp, $sup, $embauche, $salaire, $commission);
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) {
    $id = $_GET['id'];
    $data = delete($id);
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) {

    $id = $_GET['id'];
    $data = rechercheEmpId($id);

    $num_employe = $data['num_employe'];
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $emploi = $data['emploi'];
    $sup = $data['sup'];
    $embauche = $data['embauche'];
    $salaire = $data['salaire'];
    $commission = $data['commission'];
    $noserv = $data['noserv'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                        <a href="accueil.php?"><button class="btn btn-outline-success" type="button">Accueil</button></a>
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
                            <th scope="col">num_employe</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Emploi</th>
                            <th scope="col">Sup</th>
                            <th scope="col">Embauche</th>
                            <th scope="col">salaire</th>
                            <th scope="col">commission</th>
                            <th scope="col">Noserv</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Détails</th>
                        </tr>
                        <?php


                        foreach ($data = rechercheEmp() as $key => $value) {


                        ?>
                            <tr>
                                <td><?php echo $value['num_employe']; ?></td>
                                <td><?php echo $value['nom']; ?></td>
                                <td><?php echo $value['prenom']; ?></td>
                                <td><?php echo $value['emploi']; ?></td>
                                <td><?php echo $value['sup']; ?></td>
                                <td><?php echo $value['embauche']; ?></td>
                                <td><?php echo $value['salaire']; ?></td>
                                <td><?php echo $value['commission']; ?></td>
                                <td><?php echo $value['num_service']; ?></td>
                                <td><a href="gestion.php?id=<?php echo $value['num_employe']; ?>&action=modif"><button type="button" class="btn btn-success">Modifier</button></a></td>
                                <td><?php if (isServiceAffect($value['num_employe']) == FALSE) {
                                    ?>
                                        <a href="gestion.php?id=<?php echo $value['num_employe']; ?>&action=sup"><button type="button" class="btn btn-danger">X</button></a>
                                    <?php
                                    } ?></td>
                                <td><a href="profil.php?id=<?php echo $value['num_employe']; ?>&action=infos"><button type="button" class="btn btn-info">Détails</button></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
                <div class="container-fluid">
                    <div class="row">
                        <a href="gestion.php?action=ajouter" class="mx-auto d-block"><button type="button" class="btn btn-primary">Ajouter</button></a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="col-6 rounded mx-auto d-block">
                        <form action="gestion.php?action=<?php if ($_GET['action'] == "modif") {
                                                                echo "edit";
                                                            } else {
                                                                echo "ajouter";
                                                            }
                                                            ?>" class="form" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="num_employe" name="num_employe" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                            echo $num_employe;
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
                                <input type="text" class="form-control" id="salaire" name="salaire" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $salaire;
                                                                                                            } ?>" placeholder="salaireaire">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="commission" name="commission" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                        echo $commission;
                                                                                                                    } ?>" placeholder="commissionission">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="noserv" name="noserv" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $noserv;
                                                                                                            } ?>" placeholder="numero de service">
                            </div>
                            <button type="submit" class="btn btn-primary">Modiffier/Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>