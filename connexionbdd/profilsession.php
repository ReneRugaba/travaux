<?php
session_start();
include('conditionConsultPages.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Page de profil</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mx-auto d-block">
                <form class="form-inline form">
                    <fieldset>
                        <h1>WELCOM IN YOUR PROFIL PAGE!!</h1>
                        <h3><?php echo $_SESSION['username']; ?></h3>
                        <legend>PORTAIL:</legend>
                        <a href="gestion.php"><button class="btn btn-outline-success" type="button">Tableau employés</button></a>
                        <a href="service.php"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                        <a href="deconnexion.php"><button type="button" class="btn btn-outline-dark">Déconnexion</button></a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>

</html>