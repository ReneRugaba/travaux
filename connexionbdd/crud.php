<?php
include("connectbdd.php");


function add($noemp,$nom,$prenom,$emp,$sup,$embauche,$sal,$comm,$noserv)
{
    $db=connectBdd();
    $sql="INSERT INTO employe VALUES($noemp,$nom,$prenom,$emp,$sup,$embauche,$sal,$comm,$noserv)";
    $rs=mysqli_query($db,$sql);
}

function delete($id)
{
    $db=connectBdd();
    $sql="DELETE FROM employe WHERE num_employe=$id";
    $res=mysqli_query($db,$sql);
}

function rechercheEmpId($id)
{
    $db=connectBdd();
    $sql="SELECT* FROM employe WHERE num_employe=$id";
    $rs=mysqli_query($db,$sql);
    $data=mysqli_fetch_array($rs, MYSQLI_ASSOC);
    return $data;
}

function edit($id,$nom,$prenom,$emp,$sup,$embauche,$sal,$comm)
{
    $db=connectBdd();
    $sql="UPDATE employe SET  nom=$nom, prenom=$prenom, emploi=$emp, sup=$sup, embauche=$embauche, salaire=$sal, commission=$comm  WHERE num_service=$id";
    $data=mysqli_query($db,$sql);
}

function afficher($id)
{
    $db=connectBdd();
    $rs=mysqli_query($db,"SELECT * FROM employe WHERE num_employe=$id");
    $data=mysqli_fetch_array($rs,MYSQLI_ASSOC);
    return $data;
}

function rechercheEmp(){

    $db=connectBdd();
    $rs=mysqli_query($db,'SELECT * FROM employe');
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
    return $data;
}

function isServiceAffect($num)
{
    $db=connectBdd();
    $rs=mysqli_query($db,"SELECT*FROM employe  WHERE $num=sup");
    $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
    if (!empty($data)) {
        return TRUE;
    }
}
