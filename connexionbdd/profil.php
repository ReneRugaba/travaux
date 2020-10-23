<?php
include("crud.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t17EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI1xXr1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href = "https://fonts.googleapis.com/css2? family = Lusitana: wght @ 700 & display = swap" rel = "stylesheet">
    <title>Profil</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
                <?php
                   if (!empty($_GET)) {
                        if ($_GET['action']=='infos') 
                        {
                            $id=$_GET['id'];
                            $data=afficher($id);
                            ?>
                            <div >
                                <div>
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
            
        </div>
    </div>
</body>
</html>