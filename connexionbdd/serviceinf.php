<?php
include("crudnoserv.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t17EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI1xXr1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href = "https://fonts.googleapis.com/css2? family = Lusitana: wght @ 700 & display = swap" rel = "stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_GET['action']=='infosserv') {
        $id=$_GET['id'];
        $data=rechercheserv($id);
        ?>
        <div >
            <div>
                <h3 ><?php echo $data['num_service']; ?></h3>
                <h1><?php echo $data['nom_service']; ?></h1>
                <h1><?php echo $data['ville']; ?></h1>
            </div>
        </div>
        <?php 
    }
    ?>
            <div class="col-6 mx-auto d-block">
                <form class="form-inline form">
                   <fieldset>
                   <legend>PORTAIL:</legend>
                        <a href="gestion.php"><button class="btn btn-outline-success" type="button">Tableau employés</button></a>
                        <a href="service.php?action=ajouter"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                   </fieldset>
                 </form>
            </div>
</body>
</html>