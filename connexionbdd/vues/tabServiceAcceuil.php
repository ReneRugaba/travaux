<?php
include_once __DIR__ . '/head.php';
include_once __DIR__ . '/trServ.php';
/**
 * page d'acceuil tableau service
 *
 * @return html
 */
function tabServiceAccueil()
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
                            <a href="profilsession.php"><button class="btn btn-outline-success" type="button">Accueil</button></a>
                            <a href="gestion.php"><button class="btn btn-outline-primary" type="button">Tableau employés</button></a>
                            <?php
                            if ($_SESSION['profil'] == 'admin') {
                            ?>
                                <a href="service.php?action=ajouter"><button class="btn btn-outline-warning" type="button">Ajouter service!!</button></a>
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
                            trServ();
                            //ici je fai sun foreach pour recuperer la table entière, à l'aide de la fonction que j'ai créé dans crudnoserv.php, que je receptionne dans un tableau que je parcours à l'aide du foreach
                            $data = new ServiceService();
                            $data = $data->afficheServ();
                            $isAdmin = $_SESSION['profil'];
                            afficheTabServ($data, $isAdmin);
                            ?>
                    </table>

                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
