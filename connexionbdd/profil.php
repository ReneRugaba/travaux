<?php
include("crud.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href = "https://fonts.googleapis.com/css2? family = Lusitana: wght @ 700 & display = swap" rel = "stylesheet">
    <title>Profil</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
                <div class="col-6 mx-auto d-block">
                <form class="form-inline form">
                   <fieldset>
                    <?php
                    //ici je verifie si le get est pas vide
                    if (!empty($_GET)) {
                            if ($_GET['action']=='infos') //ici je verifie si dans le get actint==infos
                            {
                                $id=$_GET['id'];// je recupere ID dans le get et je la met dans une variable
                                $data=afficher($id);// j'appelle la fonction afficher pour recuperer les infos de l'employe correspondant à l'ID du get
                                ?>
                                <div >
                                    <div>
                                    <!-- ici j'echo chaque info de l'employé correspondant -->
                                        <h3 ><?php echo $data['num_employe']; ?></h3>
                                        <h1><?php echo $data['nom']; ?></h1>
                                        <h1><?php echo $data['prenom']; ?></h1>
                                        <h1><?php echo $data['emploi']; ?></h1>
                                        <p><?php echo $data['sup']; ?></p>
                                        <p><?php echo $data['embauche']; ?></p>
                                        <p><?php echo $data['salaire']; ?></p>
                                        <p><?php echo $data['commission']; ?></p>
                                        <p><?php echo $data['num_service']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                    }
                    ?>
                   <legend>PORTAIL:</legend>
                        <a href="gestion.php?action=ajouter"><button class="btn btn-outline-success" type="button">Tableau employés</button></a>
                        <a href="service.php?action=ajouter"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                   </fieldset>
                 </form>
            </div>
            
        </div>
    </div>
</body>
</html>