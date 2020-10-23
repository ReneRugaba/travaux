<?php
include("connectbdd.php");

function add($num_service,$service,$ville)
{
    $db=connectBdd();
    $sql="INSERT INTO service VALUES($num_service,$service,$ville)";
    $data=mysqli_query($db,$sql);
}

function delete($id)
{
    $db=connectBdd();
    $sql="DELETE FROM service WHERE num_service=$id";
    $res=mysqli_query($db,$sql);
}

function rechercheserv($id)
{
    $db=connectBdd();
    $rs=mysqli_query($db,"SELECT * FROM service WHERE num_service=$id");
    $data=mysqli_fetch_array($rs,MYSQLI_ASSOC);
    return $data;
}

function edit($id,$service,$ville)
{
    $db=connectBdd();
    $sql="UPDATE service SET  service=$service, ville=$ville WHERE noserv=$id";
    $data=mysqli_query($db,$sql);
}

function afficheDansForm($id)
{
    $db=connectBdd();
    $sql="SELECT* FROM service WHERE num_service=$id";
    $rs=mysqli_query($db,$sql);
    $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
    return $data;
}

function afficheTab()
{
    $db=connectBdd();
    $rs=mysqli_query($db,'SELECT * FROM service');
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
    return $data;
}

function isServiceAffect($num)
{
    $db=connectBdd();
    $rs=mysqli_query($db,"SELECT*FROM employe AS A INNER JOIN service AS B ON A.num_service=B.num_service WHERE A.num_service=$num");
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
    if (!empty($data)) {
        return TRUE;
    }
}