<?php
 $db=mysqli_init();
 mysqli_real_connect($db,'localhost','malakaie','123456','gestionemploye');

 if (!empty($_POST) && isset($_GET['action']) && $_GET['action']=='ajouter') {
    if (isset($_POST['noemp']) && !empty($_POST['noemp']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) {

        $noemp=$_POST['noemp'];
        $nom=$_POST['nom'] ? "'".$_POST['nom']."'":'NULL';
        $prenom=$_POST['prenom'] ? "'".$_POST['prenom']."'":'NULL';
        $emp=$_POST['emploi'] ? "'".$_POST['emploi']."'":'NULL';
        $sup=$_POST['sup'] ? "'".$_POST['sup']."'":'NULL';
        $embauche=$_POST['embauche'] ? "'".$_POST['embauche']."'":'NULL';
        $sal=$_POST['sal'] ? "'".$_POST['sal']."'":'NULL';
        $comm=$_POST['comm'] ? "'".$_POST['comm']."'":'NULL';
        $noserv=$_POST['noserv']; 
   
       $sql="INSERT INTO emp VALUES($noemp,$nom,$prenom,$emp,$sup,$embauche,$sal,$comm,$noserv)";
       $rs=mysqli_query($db,$sql);
    }
 }
 elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action']=='edit' && $_GET['id']) {
    $id=$_GET['id'];
   
    $nom=$_POST['nom'] ? "'".$_POST['nom']."'":'NULL';
    $prenom=$_POST['prenom'] ? "'".$_POST['prenom']."'":'NULL';
    $emp=$_POST['emploi'] ? "'".$_POST['emploi']."'":'NULL';
    $sup=$_POST['sup'] ? "'".$_POST['sup']."'":'NULL';
    $embauche=$_POST['embauche'] ? "'".$_POST['embauche']."'":'NULL';
    $sal=$_POST['sal'] ? "'".$_POST['sal']."'":'NULL';
    $comm=$_POST['comm'] ? "'".$_POST['comm']."'":'NULL';


    $sql="UPDATE emp SET  nom=$nom, prenom=$prenom, emploi=$emp, sup=$sup, embauche=$embauche, sal=$sal, comm=$comm  WHERE noemp=$id";
    $data=mysqli_query($db,$sql);
}
 elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action']=='sup' && $_GET['id']){
        $id=$_GET['id'];
        $sql="DELETE FROM emp WHERE noemp=$id";
        $res=mysqli_query($db,$sql);

    
 }
 elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action']=='modif' && $_GET['id']){
    $id=$_GET['id'];
    $sql="SELECT* FROM emp WHERE noemp=$id";
    $rs=mysqli_query($db,$sql);
    $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
    $noemp=$data['noemp'];
    $nom=$data['nom'];
    $prenom=$data['prenom'];
    $emploi=$data['emploi'];
    $sup=$data['sup'];
    $embauche=$data['embauche'];
    $sal=$data['sal'];
    $comm=$data['comm'];
    $noserv=$data['noserv'];
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
                    <th scope="col">Noemp</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Emploi</th>
                    <th scope="col">Sup</th>
                    <th scope="col">Embauche</th>
                    <th scope="col">Sal</th>
                    <th scope="col">Comm</th>
                    <th scope="col">Noserv</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                    <th scope="col">Détails</th>
                    </tr>
                    <?php
                        $rs=mysqli_query($db,'SELECT * FROM emp');
                        
                        while ($data=mysqli_fetch_array($rs, MYSQLI_ASSOC)) {
                            ?>
                                        <tr>
                                        <td><?php echo $data['noemp'];?></td>
                                        <td><?php echo $data['nom'];?></td>
                                        <td><?php echo $data['prenom'];?></td>
                                        <td><?php echo $data['emploi'];?></td>
                                        <td><?php echo $data['sup'];?></td>
                                        <td><?php echo $data['embauche'];?></td>
                                        <td><?php echo $data['sal'];?></td>
                                        <td><?php echo $data['comm'];?></td>
                                        <td><?php echo $data['noserv'];?></td>
                                        <td><a href="gestion.php?id=<?php echo $data['noemp'];?>&action=modif"><button type="button" class="btn btn-success">Modifier</button></a></td>
                                        <td><a href="gestion.php?id=<?php echo $data['noemp'];?>&action=sup"><button type="button" class="btn btn-danger">X</button></a></td>
                                        <td><a href="profil.php?id=<?php echo $data['noemp'];?>&action=infos"><button type="button" class="btn btn-info">Détails</button></a></td>
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
                            <form action="gestion.php?action=<?php if ( $_GET['action']=="modif") {
                                echo "edit";
                            }
                            else {
                                echo "ajouter";
                            }
                            ?>" class="form" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="noemp" name="noemp" value="<?php if ($_GET['action']=='modif') {
                                        echo $noemp;
                                    }
                                    ?>" placeholder="numero d'employé">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?php if ($_GET['action']=='modif') {
                                        echo $nom;
                                    }?>" placeholder="nom">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php if ($_GET['action']=='modif') {
                                        echo $prenom;
                                    }?>" placeholder="prenom">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="emploi" name="emploi" value="<?php if ($_GET['action']=='modif') {
                                        echo $emploi;
                                    }?>" placeholder="emploi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sup" name="sup" value="<?php if ($_GET['action']=='modif') {
                                        echo $sup;
                                    }?>" placeholder="sup">
                                </div>
                                <div class="form-group">
                                <label for="date">Date embauche:</label>
                                    <input type="date" class="form-control" id="date" name="embauche" value="<?php if ($_GET['action']=='modif') {
                                        echo $embauche;
                                    }?>" placeholder="embauche">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sal" name="sal" value="<?php if ($_GET['action']=='modif') {
                                        echo $sal;
                                    }?>" placeholder="salaire">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="comm" name="comm" value="<?php if ($_GET['action']=='modif') {
                                        echo $comm;
                                    }?>" placeholder="commission">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="noserv" name="noserv" value="<?php if ($_GET['action']=='modif') {
                                        echo $noserv;
                                    }?>" placeholder="numero de service">
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