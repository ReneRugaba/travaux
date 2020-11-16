<?php
include_once __DIR__ . '/head.php';
/**
 * details d'un employe
 *
 * @return html
 */
function profiEmp()
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <?php head(); ?>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 mx-auto d-block">
                    <form class="form-inline form">
                        <fieldset>
                            <?php
                            //ici je verifie si le get est pas vide
                            if (!empty($_GET)) {
                                if ($_GET['action'] == 'infos') //ici je verifie si dans le get actint==infos
                                {
                                    $id = $_GET['id']; // je recupere ID dans le get et je la met dans une variable
                                    $emp = new EmployeService();
                                    $data = $emp->aff($id); // j'appelle la methode aff absetraite de ma class EmployeService qui fait le lien avec dao et je recupère un array
                                    afficheDetailsEmp($data); //cette foction me sert à afficher le detail d'un employe qui est dans ma couche vues de mon appli
                                }
                            }
                            ?>
                            <a href="gestion.php"><button class="btn btn-outline-success" type="button">Tableau employés</button></a>
                            <a href="service.php"><button class="btn btn-outline-primary" type="button">Tableau des services</button></a>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
    </body>

    </html>
<?php
}
