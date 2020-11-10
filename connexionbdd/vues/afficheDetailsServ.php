<?php
function afficheDetailsServ(array $data)
{
?>
    <div>
        <!-- ici j'echo chaque info du service correspondant -->
        <div>
            <h3><?php echo $data['noserv']; ?></h3>
            <h1><?php echo $data['service']; ?></h1>
            <h1><?php echo $data['ville']; ?></h1>
        </div>
    </div>
<?php
}
