<?php
include_once __DIR__ . '/Formulaire.php';
include_once __DIR__ . '/head.php';
include_once __DIR__ . '/trEmp.php';


/**
 * page d'accueil employe
 *
 * @return html
 */
function tabEmpaccueil()
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <?php
    head();
    ?>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 mx-auto d-block">
                    <form class="form-inline form">
                        <fieldset>
                            <legend>PORTAIL:</legend>
                            <a href="profilsession.php?"><button class="btn btn-outline-success" type="button">Accueil</button></a>
                            <a href="service.php"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                            <?php
                            if ($_SESSION['profil'] == 'admin') {
                            ?>
                                <a href="gestion.php?action=ajouter"><button class="btn btn-outline-warning" type="button">Ajouter employé</button></a>
                            <?php
                            }
                            ?>
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
                            <?php
                            trEmp();
                            //ici je fai sun foreach pour recuperer la table entière, à l'aide de la fonction que j'ai créé dans crud.php, que je receptionne dans un tableau que je parcours à l'aide du foreach
                            $data = new EmployeService();
                            $data = $data->rechercheEmp();
                            $isAdmin = $_SESSION['profil'];
                            afficheTabEmp($data, $isAdmin);
                            ?>
                    </table>
                </div>
            </div>

        </div>
    </body>

    </html>
<?php
}
