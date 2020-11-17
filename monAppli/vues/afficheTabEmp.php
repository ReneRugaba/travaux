<?php

/**
 * infos de chaque employe dans le tableau employe
 *
 * @param Employe2 $data
 * @param string $isadmin
 * @return html
 */
function afficheTabEmp(array $data, string $isadmin)
{
    foreach ($data as $value) {

        //chaque value contient un tableau assoc et je parcours à partir d'ici
?>
        <tr>
            <td><?php echo $value->getNoemp(); ?></td>
            <td><?php echo $value->getNom(); ?></td>
            <td><?php echo $value->getPrenom(); ?></td>
            <td><?php echo $value->getEmploi(); ?></td>
            <td><?php echo $value->getSup(); ?></td>
            <td><?php echo $value->getEmbauche()->format('d-m-Y'); ?></td>
            <td><?php if ($isadmin == 'admin') {
                    echo $value->getSal();
                } ?></td>
            <td><?php if ($isadmin == 'admin') {
                    echo $value->getComm();
                } ?></td>
            <td><?php echo $value->getNoserv(); ?></td>
            <td><a href="gestion.php?id=<?php echo $value->getNoemp(); ?>&action=modif"><?php
                                                                                        if ($isadmin == 'admin') {
                                                                                        ?><button type="button" class="btn btn-success">Modifier</button><?php
                                                                                                                                                        }
                                                                                                                                                            ?></a></td>

            <!-- ici je gère le bouton de suppression à l'aide de la fonction isServiceAffect() pour enlever la possibilité de supprimer un supperieur hierarchique -->
            <td><?php
                $affect = new EmployeService();
                if ($affect->affect($value->getNoemp()) == FALSE && $isadmin == 'admin') {
                ?>
                    <a href="gestion.php?id=<?php echo $value->getNoemp(); ?>&action=sup"><button type="button" class="btn btn-danger">X</button></a>
                <?php
                } ?></td>
            <!-- ici je gère le bouton de suppression à l'aide de la fonction isServiceAffect() pour enlever la possibilité de supprimer un supperieur hierarchique -->

            <td><a href="profil.php?id=<?php echo $value->getNoemp(); ?>&action=infos"><button type="button" class="btn btn-info">Détails</button></a></td>
        </tr>
<?php
    }
}
