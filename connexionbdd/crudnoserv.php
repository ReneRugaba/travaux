<?php
include("connectbdd.php");
//cette fonction ajoute un nouveau service dans la table service
function add($num_service,$service,$ville)
{
    $db=connectBdd();
    $sql="INSERT INTO service VALUES($num_service,$service,$ville)";
    $data=mysqli_query($db,$sql);
}

//cet fonction suprime la row d'un service par ID=num_service
function delete($id)
{
    $db=connectBdd();
    $sql="DELETE FROM service WHERE num_service=$id";
    $res=mysqli_query($db,$sql);
}
//cette fonction retoune la row d'un service et le retourne dans un tableau assoc pour etre afficher dans serviceinf.php
function rechercheserv($id)
{
    $db=connectBdd();
    $rs=mysqli_query($db,"SELECT * FROM service WHERE num_service=$id");
    $data=mysqli_fetch_array($rs,MYSQLI_ASSOC);
    return $data;
}
// cette fonction met à jour les information d'un service après modification par form vis à  POST
function edit($id,$service,$ville)
{
    $db=connectBdd();
    $sql="UPDATE service SET  service=$service, ville=$ville WHERE noserv=$id";
    $data=mysqli_query($db,$sql);
}
//fonction recupere toute la table service et la retourne sous forme d'un array associatif
function afficheTab()
{
    $db=connectBdd();
    $rs=mysqli_query($db,'SELECT * FROM service');
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
    return $data;
}
//cette fonction verifie si le num_service, dans la table service, correspond au num_service, dans employe, par jointure et retourne un booleen
function isServiceAffect($num)
{
    $db=connectBdd();
    $rs=mysqli_query($db,"SELECT*FROM employe AS A INNER JOIN service AS B ON A.num_service=B.num_service WHERE A.num_service=$num");
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
    if (!empty($data)) {
        return TRUE;
    }
}