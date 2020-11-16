<?php
include_once __DIR__ . '/head.php';
/**
 * details d'un service
 *
 * @return html
 */
function serviceInfo()
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <?php
    head();
    ?>

    <body>

        <div class="col-6 mx-auto d-block">
            <form class="form-inline form">
                <fieldset>
                    <?php
                    //ici je verifie si le get action==infosserv
                    if ($_GET['action'] == 'infosserv') {
                        $id = $_GET['id']; // je recupere ID dans le get et je la met dans une variable
                        $data = new ServiceService();
                        $data = $data->recherById($id); // j'appelle la methode recherById de mon objet de ma class serviceService qui fait le lien avec dao dans ma couche service
                        afficheDetailsServ($data);
                    }
                    ?>
                    <a href="gestion.php"><button class="btn btn-outline-success" type="button">Tableau employés</button></a>
                    <a href="service.php"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                </fieldset>
            </form>
        </div>
    </body>

    </html>
<?php
}
