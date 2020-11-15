<?php

/**
 * retourne les datails en html
 *
 * @param Service2 $data
 * @return retourne les détails d'un service
 */
function afficheDetailsServ(Service2 $data)
{
?>
    <div>
        <!-- ici j'echo chaque info du service correspondant -->
        <div>
            <h3><?php echo $data->getNoserv(); ?></h3>
            <h1><?php echo $data->getService(); ?></h1>
            <h1><?php echo $data->getVille(); ?></h1>
        </div>
    </div>
<?php
}
