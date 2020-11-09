<?php
function afficheTabServ($data, $isAdmin)
{
    foreach ($data as $value) {
        //chaque value contient un tableau assoc et je parcours à partir d'ici
?>
        <tr>
            <td><?php echo $value['noserv']; ?></td>
            <td><?php echo $value['service']; ?></td>
            <td><?php echo $value['ville']; ?></td>
            <td><a href="service.php?id=<?php echo $value['noserv']; ?>&action=modif"><?php
                                                                                        if ($isAdmin == 'admin') {
                                                                                        ?><button type="button" class="btn btn-success">Modifier</button><?php
                                                                                                                                                        }
                                                                                                                                                            ?></a></td>
            <td>
                <!-- ici je gère le bouton de suppression à l'aide de la fonction isservAffect() pour enlever la possibilité de supprimer un service qui est affecté aux employes de la tab employe grâce à la jointure -->

                <?php
                $data = new ServiceService();
                if ($data->isservAf($value['noserv']) == FALSE && $isAdmin == 'admin') {
                ?>
                    <a href="service.php?id=<?php echo $value['noserv']; ?>&action=sup"><button type="button" class="btn btn-danger">X</button>
                    </a><?php } ?>
                <!-- ici je gère le bouton de suppression à l'aide de la fonction isservAffect() pour enlever la possibilité de supprimer un service qui est affecté aux employes de la tab employe grâce à la jointure -->
            </td>
            <td><a href="serviceinf.php?id=<?php echo $value['noserv']; ?>&action=infosserv"><button type="button" class="btn btn-info" visibilyti>Détails</button></a></td>
        </tr>
<?php
    }
}
