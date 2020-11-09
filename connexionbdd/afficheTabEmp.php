<?php

function afficheTabEmp($data, $isadmin)
{
    foreach ($data as $value) {

        //chaque value contient un tableau assoc et je parcours à partir d'ici
?>
        <tr>
            <td><?php echo $value['noemp']; ?></td>
            <td><?php echo $value['nom']; ?></td>
            <td><?php echo $value['prenom']; ?></td>
            <td><?php echo $value['emploi']; ?></td>
            <td><?php echo $value['sup']; ?></td>
            <td><?php echo $value['embauche']; ?></td>
            <td><?php if ($isadmin == 'admin') {
                    echo $value['sal'];
                } ?></td>
            <td><?php if ($isadmin == 'admin') {
                    echo $value['comm'];
                } ?></td>
            <td><?php echo $value['noserv']; ?></td>
            <td><a href="gestion.php?id=<?php echo $value['noemp']; ?>&action=modif"><?php
                                                                                        if ($isadmin == 'admin') {
                                                                                        ?><button type="button" class="btn btn-success">Modifier</button><?php
                                                                                                                                                        }
                                                                                                                                                            ?></a></td>

            <!-- ici je gère le bouton de suppression à l'aide de la fonction isServiceAffect() pour enlever la possibilité de supprimer un supperieur hierarchique -->
            <td><?php
                $affect = new EmployeService();
                if ($affect->affectEmp($value['noemp']) == FALSE && $isadmin == 'admin') {
                ?>
                    <a href="gestion.php?id=<?php echo $value['noemp']; ?>&action=sup"><button type="button" class="btn btn-danger">X</button></a>
                <?php
                } ?></td>
            <!-- ici je gère le bouton de suppression à l'aide de la fonction isServiceAffect() pour enlever la possibilité de supprimer un supperieur hierarchique -->

            <td><a href="profil.php?id=<?php echo $value['noemp']; ?>&action=infos"><button type="button" class="btn btn-info">Détails</button></a></td>
        </tr>
<?php
    }
}
