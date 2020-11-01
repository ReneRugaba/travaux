<?php
include("connectbdd.php");
//cette fonction ajoute un nouveau serv dans la table serv
function add($noserv, $serv, $ville)
{
    $db = connectBdd();
    $sql = "INSERT INTO serv VALUES($noserv,$serv,$ville)";
    $data = mysqli_query($db, $sql);
}

//cet fonction suprime la row d'un serv par ID=noserv
function delete($id)
{
    $db = connectBdd();
    $sql = "DELETE FROM serv WHERE noserv=$id";
    $res = mysqli_query($db, $sql);
}
//cette fonction retoune la row d'un serv et le retourne dans un tableau assoc pour etre afficher dans servinf.php
function rechercheserv($id)
{
    $db = connectBdd();
    $rs = mysqli_query($db, "SELECT * FROM serv WHERE noserv=$id");
    $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);
    return $data;
}
// cette fonction met à jour les information d'un serv après modification par form vis à  POST
function edit($id, $serv, $ville)
{
    $db = connectBdd();
    $sql = "UPDATE serv SET  service=$serv, ville=$ville WHERE noserv=$id";
    $data = mysqli_query($db, $sql);
}
//fonction recupere toute la table serv et la retourne sous forme d'un array associatif
function afficheTab()
{
    $db = connectBdd();
    $rs = mysqli_query($db, 'SELECT * FROM serv');
    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    return $data;
}
//cette fonction verifie si le noserv, dans la table serv, correspond au noserv, dans emp, par jointure et retourne un booleen
function isservAffect($num)
{
    $db = connectBdd();
    $rs = mysqli_query($db, "SELECT*FROM emp AS A INNER JOIN serv AS B ON A.noserv=B.noserv WHERE A.noserv=$num");
    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    if (!empty($data)) {
        return TRUE;
    }
}
