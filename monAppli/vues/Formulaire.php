<?php

include_once __DIR__ . '/head.php';
/**
 * formulaire modification/ajout employe
 *
 * @param Employe2|null $emp
 * @return html
 */
function Formulaire(?Employe2 $emp, $errCodes = null, $errMessages = null)
{
    if ($errCodes && $errMessages) {
        echo "code: " . $errCodes . 'messages: ' . $errMessages;
    } else {
?>
        <!DOCTYPE html>
        <html lang="en">

        <?php
        head();
        ?>

        <body>
            <?php
            if ($_SESSION['profil'] == 'admin') {
            ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 mx-auto d-block">
                            <form class="form-inline form">
                                <fieldset>
                                    <legend>PORTAIL:</legend>
                                    <a href="profilsession.php?"><button class="btn btn-outline-success" type="button">Accueil</button></a>
                                    <a href="service.php"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                                    <a href="gestion.php"><button class="btn btn-outline-warning" type="button">Tableau employés</button></a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="col-6 rounded mx-auto d-block">
                        <!-- ce formulaire gere les ajouts et les modifications de mannière inteligente grâce l'action du get -->
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
                                                                                                                echo $emp->getNoemp();
                                                                                                            }
                                                                                                            ?>" placeholder="numero d'employé">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                            echo $emp->getNom();
                                                                                                        } ?>" placeholder="nom">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $emp->getPrenom();
                                                                                                            } ?>" placeholder="prenom">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="emploi" name="emploi" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $emp->getEmploi();
                                                                                                            } ?>" placeholder="emploi">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="sup" name="sup" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                        echo $emp->getSup();
                                                                                                    } ?>" placeholder="sup">
                            </div>
                            <div class="form-group">
                                <label for="date">Date embauche:</label>
                                <input type="date" class="form-control" id="date" name="embauche" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $emp->getEmbauche()->format('Y-m-d');
                                                                                                            } ?>" placeholder="embauche">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="sal" name="sal" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                        echo $emp->getSal();
                                                                                                    } ?>" placeholder="salaire">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="comm" name="comm" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                            echo $emp->getComm();
                                                                                                        } ?>" placeholder="commission">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="noserv" name="noserv" value="<?php if ($_GET['action'] == 'modif') {
                                                                                                                echo $emp->getNoserv();
                                                                                                            } ?>" placeholder="numero de service">
                            </div>
                            <?php
                            if ($_SESSION['profil'] == 'admin') {
                            ?><button type="submit" class="btn btn-primary">Modiffier/Ajouter</button><?php
                                                                                                    }
                                                                                                        ?>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </body>

        </html>
<?php
    }
}
