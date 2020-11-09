<?php
session_start();
include('conditionConsultPages.php');
include_once('EmployeService.php');



if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajouter') { //je verifie si le tableau $_POST n'est pas vide et si dans le GET[action]==ajouter
    if (isset($_POST['noemp']) && !empty($_POST['noemp']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) { //Si la verification est ok je verifie si dans le post noemp  et noserv existe et qu'il ne sont pas vide

        $sup = $_POST['sup'] ? $_POST['sup'] : NULL;
        $sal = $_POST['sal'] ? $_POST['sal'] : NULL;
        $comm = $_POST['comm'] ? $_POST['comm'] : NULL;
        $empServ = new Employe2();
        $empServ->setNoemp($_POST['noemp'])->setNom($_POST['nom'])->setPrenom($_POST['prenom'])
            ->setEmploi($_POST['emploi'])->setSup($sup)->setEmbauche($date = new DateTime($_POST['embauche']))
            ->setSal($sal)->setComm($comm)->setNoserv($_POST['noserv']);
        EmployeService::AddEmploye($empServ);
    }
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'edit') { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==edit
    //je rentre les valeurs reçu dans le post dans des variables en anticipant leur valeur, s'ils sont vides, en leur donnant une valeur NULL


    $employe = new Employe2(); //ici je crée mon employe avec ma class Employe2

    /**
     * ici je mets mes $_POST dans des variable avec anticipation valeur null pour int et float
     */
    $id = $_POST['noemp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $emp = $_POST['emploi'];
    $sup = $_POST['sup'] ? $_POST['sup'] : NULL;
    $embauche = $_POST['embauche'];
    $sal = $_POST['sal'] ? $_POST['sal'] : NULL;
    $comm = $_POST['comm'] ? $_POST['comm'] : NULL;

    $noser = $_POST['noserv'];
    /**
     * à partir d'ici grace au setter, je donne la valeur de mes $_POST à mon objet employe
     */
    $employe->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emp)->setSup($sup)->setEmbauche($date = new DateTime($embauche))->setSal($sal)->setComm($comm)->setNoserv($noser);



    //j'appelle la fonction edit que j'ai créé dans crud.php qui s'occupe de modifier les infos correspondant a noemp dans la tab employe et je lui donne Mon objet employe en argu
    EmployeService::edit($employe);
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==sup et que id est present dans le get
    $id = $_GET['id']; // ici je recupere l'id dans le get et je le met dans une variable
    employeService::sup($id); //je fais appel à la fonction delete dans crudnoserv.php qui va s'ocuper de sup la row corespondant id


} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide , si dans le GET[action]==modif et si l'id est bien presente dans le get
    $id = $_GET['id']; //je recup l'id et je la met dans la variable $id
    $data = employeService::modif($id); //j'utilise la fonction rechercheEmpId, créé dans crud.php, pour recuperer la row de la tab emp vis à $id, qui m'est retourné en tableau associatif dans la variable data

    //ici je recupère chaque élement dans data grace au clés du tableau assoc et je les met dans une variable
    $noemp = $data['noemp'];
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $emploi = $data['emploi'];
    $sup = $data['sup'];
    $embauche = $data['embauche'];
    $sal = $data['sal'];
    $comm = $data['comm'];
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
                        foreach ($data->rechercheEmp() as $key => $value) {

                            //chaque value contient un tableau assoc et je parcours à partir d'ici
                        ?>
                            <tr>
                                <td><?php echo $value['noemp']; ?></td>
                                <td><?php echo $value['nom']; ?></td>
                                <td><?php echo $value['prenom']; ?></td>
                                <td><?php echo $value['emploi']; ?></td>
                                <td><?php echo $value['sup']; ?></td>
                                <td><?php echo $value['embauche']; ?></td>
                                <td><?php if ($_SESSION['profil'] == 'admin') {
                                        echo $value['sal'];
                                    } ?></td>
                                <td><?php if ($_SESSION['profil'] == 'admin') {
                                        echo $value['comm'];
                                    } ?></td>
                                <td><?php echo $value['noserv']; ?></td>
                                <td><a href="gestion.php?id=<?php echo $value['noemp']; ?>&action=modif"><?php
                                                                                                            if ($_SESSION['profil'] == 'admin') {
                                                                                                            ?><button type="button" class="btn btn-success">Modifier</button><?php
                                                                                                                                                                            }
                                                                                                                                                                                ?></a></td>

                                <!-- ici je gère le bouton de suppression à l'aide de la fonction isServiceAffect() pour enlever la possibilité de supprimer un supperieur hierarchique -->
                                <td><?php
                                    $affect = new EmployeService();
                                    if ($affect->affectEmp($value['noemp']) == FALSE && $_SESSION['profil'] == 'admin') {
                                    ?>
                                        <a href="gestion.php?id=<?php echo $value['noemp']; ?>&action=sup"><button type="button" class="btn btn-danger">X</button></a>
                                    <?php
                                    } ?></td>
                                <!-- ici je gère le bouton de suppression à l'aide de la fonction isServiceAffect() pour enlever la possibilité de supprimer un supperieur hierarchique -->

                                <td><a href="profil.php?id=<?php echo $value['noemp']; ?>&action=infos"><button type="button" class="btn btn-info">Détails</button></a></td>
                            </tr>
                        <?php
                        }
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