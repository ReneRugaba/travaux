<?php


function Formulaire(?Employe2 $emp)
{
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
<?php
    }
}
