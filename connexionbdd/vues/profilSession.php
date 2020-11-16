<?php
include_once __DIR__ . '/head.php';
/**
 * profil session après connexion avec succes
 *
 * @return html
 */
function profiSession()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <?php head(); ?>

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
<?php
}
