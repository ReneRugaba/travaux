<?php
session_start();
include('conditionConsultPages.php');
include("crudnoserv.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2? family = Lusitana: wght @ 700 & display = swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <div class="col-6 mx-auto d-block">
        <form class="form-inline form">
            <fieldset>
                <?php
                //ici je verifie si le get action==infosserv
                if ($_GET['action'] == 'infosserv') {
                    $id = $_GET['id']; // je recupere ID dans le get et je la met dans une variable
                    $data = rechercheserv($id); // j'appelle la fonction afficherserv pour recuperer les infos du service correspondant à l'ID du get
                ?>
                    <div>
                        <!-- ici j'echo chaque info du service correspondant -->
                        <div>
                            <h3><?php echo $data['noserv']; ?></h3>
                            <h1><?php echo $data['service']; ?></h1>
                            <h1><?php echo $data['ville']; ?></h1>
                        </div>
                    </div>
                <?php
                }
                ?>
                <a href="gestion.php?action=ajouter"><button class="btn btn-outline-success" type="button">Tableau employés</button></a>
                <a href="service.php?action=ajouter"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
            </fieldset>
        </form>
    </div>
</body>

</html>