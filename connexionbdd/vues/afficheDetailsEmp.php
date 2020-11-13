<?php



function afficheDetailsEmp(Employe2 $data)
{
?>
    <div>
        <div>
            <!-- ici j'echo chaque info de l'employé correspondant -->
            <h3><?php echo $data->getNoemp(); ?></h3>
            <h1><?php echo $data->getNom(); ?></h1>
            <h1><?php echo $data->getPrenom(); ?></h1>
            <h1><?php echo $data->getEmploi(); ?></h1>
            <p><?php echo $data->getSup(); ?></p>
            <p><?php echo $data->getEmbauche()->format("d-m-Y"); ?></p>
            <p><?php if ($_SESSION['profil'] == 'admin') {
                    echo $data->getSal();
                } ?></p>
            <p><?php if ($_SESSION['profil'] == 'admin') {
                    echo $data->getComm();
                } ?></p>
            <p><?php echo $data->getNoserv(); ?></p>
        </div>
    </div>
<?php
}
