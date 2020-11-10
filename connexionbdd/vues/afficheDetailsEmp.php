<?php



function afficheDetailsEmp(array $data)
{
?>
    <div>
        <div>
            <!-- ici j'echo chaque info de l'employé correspondant -->
            <h3><?php echo $data['noemp']; ?></h3>
            <h1><?php echo $data['nom']; ?></h1>
            <h1><?php echo $data['prenom']; ?></h1>
            <h1><?php echo $data['emploi']; ?></h1>
            <p><?php echo $data['sup']; ?></p>
            <p><?php echo $data['embauche']; ?></p>
            <p><?php if ($_SESSION['profil'] == 'admin') {
                    echo $data['sal'];
                } ?></p>
            <p><?php if ($_SESSION['profil'] == 'admin') {
                    echo $data['comm'];
                } ?></p>
            <p><?php echo $data['noserv']; ?></p>
        </div>
    </div>
<?php
}
