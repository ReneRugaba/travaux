<?php
session_start();
include('conditionConsultPages.php');
include("crudnoserv.php");



if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajouter') { //je verifie si le tableau $_POST n'est pas vide et si dans le GET[action]==ajouter
    if (isset($_POST['noserv'])) { //Si la verification est ok je verifie si dans le post noserv n'est pas vide
        //je recupere chaque element du post dans des variables en anticipant leur valeur, s'ils sont vides, en leur donnant une valeur NULL
        $noserv = $_POST['noserv'];
        $service = $_POST['service'] ? "'" . $_POST['service'] . "'" : 'NULL';
        $ville = $_POST['ville'] ? "'" . $_POST['ville'] . "'" : 'NULL';

        //ici je fait appel à la foction add que j'ai créé dans crudnoserv.php qui s'occupe de inserer les infos dans les variable dans la tab service
        $data = add($noserv, $service, $ville);
    }
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'edit') { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==edit
    //je rentre les valeurs reçu dans le post dans des variables en anticipant leur valeur, s'ils sont vides, en leur donnant une valeur NULL
    $id = $_POST['noserv'];
    $service = $_POST['service'] ? "'" . $_POST['service'] . "'" : 'NULL';
    $ville = $_POST['ville'] ? "'" . $_POST['ville'] . "'" : 'NULL';

    //j'appelle la fonction edit que j'ai créé dans crudnoserv.php qui s'occupe de modifier les infos correspondant a noserv  dans la tab service
    edit($id, $service, $ville);
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==sup et que id est present dans le get
    $id = $_GET['id']; // ici je recupere l'id dans le get et je le met dans une variable

    delete($id); //je fais appel à la fonction delete dans crudnoserv.php qui va s'ocuper de sup la row corespondant id

} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide , si dans le GET[action]==modif et si l'id est bien presente dans le get
    $id = $_GET['id']; //je recup l'id du get et je la met dans la variable $id
    $data = rechercheserv($id); //j'utilise la fonction rechercheserv, créé dans crud.php, pour recuperer la row de la tab emp vis à $id, qui m'est retourné en tableau associatif dans la variable data
    //ici je recupère chaque élement dans data grace au clés du tableau assoc et je les met dans une variable et je les echo dans le form de la modification
    $noserv = $data['noserv'];
    $service = $data['service'];
    $ville = $data['ville'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mx-auto d-block">
                <form class="form-inline form">
                    <fieldset>
                        <legend>PORTAIL:</legend>
                        <a href="profilsession.php"><button class="btn btn-outline-success" type="button">Accueil</button></a>
                        <a href="gestion.php?action=ajouter"><button class="btn btn-outline-primary" type="button">Tableau employés</button></a>
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
                            <th scope="col">Numero service</th>
                            <th scope="col">Service</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Détails</th>
                        </tr>
                        <?php
                        //ici je fai sun foreach pour recuperer la table entière, à l'aide de la fonction que j'ai créé dans crudnoserv.php, que je receptionne dans un tableau que je parcours à l'aide du foreach
                        foreach (afficheTab() as $key => $value) {
                            //chaque value contient un tableau assoc et je parcours à partir d'ici
                        ?>
                            <tr>
                                <td><?php echo $value['noserv']; ?></td>
                                <td><?php echo $value['service']; ?></td>
                                <td><?php echo $value['ville']; ?></td>
                                <td><a href="service.php?id=<?php echo $value['noserv']; ?>&action=modif"><?php
                                                                                                            if ($_SESSION['profil'] == 'admin') {
                                                                                                            ?><button type="button" class="btn btn-success">Modifier</button><?php
                                                                                                                                                                            }
                                                                                                                                                                                ?></a></td>
                                <td>
                                    <!-- ici je gère le bouton de suppression à l'aide de la fonction isservAffect() pour enlever la possibilité de supprimer un service qui est affecté aux employes de la tab employe grâce à la jointure -->
                                    <?php if (isservAffect($value['noserv']) == FALSE && $_SESSION['profil'] == 'admin') {
                                    ?>
                                        <a href="service.php?id=<?php echo $value['noserv']; ?>&action=sup"><button type="button" class="btn btn-danger">X</button>
                                        </a><?php } ?>
                                    <!-- ici je gère le bouton de suppression à l'aide de la fonction isservAffect() pour enlever la possibilité de supprimer un service qui est affecté aux employes de la tab employe grâce à la jointure -->
                                </td>
                                <td><a href="serviceinf.php?id=<?php echo $value['noserv']; ?>&action=infosserv"><button type="button" class="btn btn-info" visibilyti>Détails</button></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
                <div class="container-fluid">
                    <?php
                    if ($_SESSION['profil'] == 'admin') {
                    ?> <div class="row">
                            <a href="service.php?action=ajouter" class="mx-auto d-block"><button type="button" class="btn btn-primary">Ajouter</button></a>
                        </div><?php
                            }
                                ?>
                    <div class="container-fluid">
                        <div class="col-6 rounded mx-auto d-block">
                            <!-- ce formulaire gere les ajouts et les modifications de mannière inteligente grâce l'action du get -->
                            <?php
                            if ($_SESSION['profil'] == 'admin') {
                            ?>
                                <form action="service.php?action=<?php if ($_GET['action'] == "modif") {
                                                                        echo "edit";
                                                                    } else {
                                                                        echo "ajouter";
                                                                    }
                                                                    ?>" class="form" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <!-- pour chanque value du form j'echo les infos à modifier si dans le get action==modif dans le cas contraire, le placeholder remplace les values -->
                                            <input type="text" class="form-control" id="noserv" name="noserv" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                            echo $noserv;
                                                                                                                        } ?>" placeholder="numero de service">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="service" name="service" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                            echo $service;
                                                                                                                        } else {
                                                                                                                            echo "";
                                                                                                                        } ?>" placeholder="service">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ville">VILLE:</label>
                                        <select id="inputState" class="form-control" name="ville" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $ville;
                                                                                                            } else {
                                                                                                                echo "";
                                                                                                            } ?>">
                                            <option value="bourg">Bour-en-Bresse (01)</option>
                                            <option value="laon">Laon (02)</option>
                                            <option value="moulins">Moulins (03)</option>
                                            <option value="digne">Digne (04)</option>
                                            <option value="gap">Gap (05)</option>
                                            <option value="nice">Nice (06)</option>
                                            <option value="privas">Privas (07)</option>
                                            <option value="charleville">Charleville-Mézières (08)</option>
                                            <option value="foix">Foix (09)</option>
                                            <option value="troyes">Troyes (10)</option>
                                            <option value="carcassonne">Carcassonne (11)</option>
                                            <option value="rodez">Rodez (12)</option>
                                            <option value="marseille">Marseille (13)</option>
                                            <option value="caen">Caen (14)</option>
                                            <option value="aurillac">Aurilac (15)</option>
                                            <option value="angouleme">Angoulême (16)</option>
                                            <option value="larochelle">La Rochelle (17)</option>
                                            <option value="bourges">Bourges (18)</option>
                                            <option value="tulle">Tulle (19)</option>
                                            <option value="ajaccio">Ajaccio (2A)</option>
                                            <option value="bastia">Bastia (2B)</option>
                                            <option value="dijon">Dijon (21)</option>
                                            <option value="saintbrieuc">Saint-Brieuc (22)</option>
                                            <option value="gueret">Guéret (23)</option>
                                            <option value="perigueux">Périgueux (24)</option>
                                            <option value="besancon">Besançon (25)</option>
                                            <option value="lille">Valence (26)</option>
                                            <option value="evreux">Evreux (27)</option>
                                            <option value="chartres">Chartres (28)</option>
                                            <option value="quimper">Quimper (29)</option>
                                            <option value="nimes">Nîmes (30)</option>
                                            <option value="toulouse">Toulouse (31)</option>
                                            <option value="auch">Auch (32)</option>
                                            <option value="bordeaux">Bordeaux (33)</option>
                                            <option value="montpellier">Montpellier (34)</option>
                                            <option value="rennes">Rennes (35)</option>
                                            <option value="chateauroux">chateauroux (36)</option>
                                            <option value="tours">Tours (37)</option>
                                            <option value="grenoble">Grenoble (38)</option>
                                            <option value="lons">Lons-le-Saunier (39)</option>
                                            <option value="montdemarsan">Mont-de-Marsan (40)</option>
                                            <option value="blois">Blois (41)</option>
                                            <option value="saintetienne">Saint-Etienne (42)</option>
                                            <option value="lepuyenvelay">Le Puy-en-Velay (43)</option>
                                            <option value="nantes">Nantes (44)</option>
                                            <option value="orleans">Orléans (45)</option>
                                            <option value="cahors">Cahors (46)</option>
                                            <option value="agen">Agen (47)</option>
                                            <option value="mende">Mende (48)</option>
                                            <option value="angers">Angers (49)</option>
                                            <option value="saintlo">Saint-Lô (50)</option>
                                            <option value="chalons">Châlons-en-Champagne (51)</option>
                                            <option value="chaumont">Chaumont (52)</option>
                                            <option value="laval">Laval (53)</option>
                                            <option value="nancy">Nancy (54)</option>
                                            <option value="barleduc">Bar-le-Duc (55)</option>
                                            <option value="vannes">Vannes (56)</option>
                                            <option value="metz">Metz (57)</option>
                                            <option value="nevers">Nevers (58)</option>
                                            <option value="lille">Lille (59)</option>
                                            <option value="beauvais">Beauvais (60)</option>
                                            <option value="alencon">Alençon (61)</option>
                                            <option value="arras">Arras (62)</option>
                                            <option value="clermont">Clermont-Ferrand (63)</option>
                                            <option value="pau">Pau (64)</option>
                                            <option value="tarbes">Tarbes (65)</option>
                                            <option value="perpignan">Perpignan (66)</option>
                                            <option value="strasbourg">Strasbourg (67)</option>
                                            <option value="colmar">Colmar (68)</option>
                                            <option value="lyon">Lyon (69)</option>
                                            <option value="vesoul">Vesoul (70)</option>
                                            <option value="macon">Mâcon (71)</option>
                                            <option value="lemans">Le Mans (72)</option>
                                            <option value="chambery">Chambéry (73)</option>
                                            <option value="annecy">Annecy (74)</option>
                                            <option value="paris">Paris (75)</option>
                                            <option value="rouen">Rouen (76)</option>
                                            <option value="melun">Melun (77)</option>
                                            <option value="versailles">Versailles (78)</option>
                                            <option value="niort">Niort (79)</option>
                                            <option value="amiens">Amiens (80)</option>
                                            <option value="albi">Albi (81)</option>
                                            <option value="montauban">Montauban (82)</option>
                                            <option value="toulon">Toulon (83)</option>
                                            <option value="avignon">Avignon (84)</option>
                                            <option value="larochesuryon">La-Roche-sur-Yon (85)</option>
                                            <option value="poitiers">Poitiers (86)</option>
                                            <option value="limoges">Limoges (87)</option>
                                            <option value="epinal">Epinal (88)</option>
                                            <option value="auxerre">Auxerre (89)</option>
                                            <option value="belfort">Belfort (90)</option>
                                            <option value="evry">Evry (91)</option>
                                            <option value="nanterre">Nanterre (92)</option>
                                            <option value="bobigny">Bobigny (93)</option>
                                            <option value="creteil">Créteil (94)</option>
                                            <option value="pontoise">Pontoise (95)</option>
                                        </select>
                                    </div>
                                    <?php
                                    if ($_SESSION['profil'] == 'admin') {
                                    ?><button type="submit" class="btn btn-primary">Modifier</button><?php
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
    </div>
</body>

</html>