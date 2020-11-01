<?php
include("connectbdd.php"); // connection à la base de donnée

//cette fonction ajoute un employé dans la table emp
function add($noemp, $nom, $prenom, $emp, $sup, $embauche, $sal, $comm, $noserv)
{
    $db = connectBdd();
    $sql = "INSERT INTO emp VALUES($noemp,$nom,$prenom,$emp,$sup,$embauche,$sal,$comm,$noserv)";
    $rs = mysqli_query($db, $sql);
}
//cet fonction suprime la row d'un employé par ID=noemp
function delete($id)
{
    $db = connectBdd();
    $sql = "DELETE FROM emp WHERE noemp=$id";
    $res = mysqli_query($db, $sql);
}
//cette fonction retoune la row d'un employé dans le formulaire de modification
function rechercheEmpId($id)
{
    $db = connectBdd();
    $sql = "SELECT* FROM emp WHERE noemp=$id";
    $rs = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);
    return $data;
}
// cette fonction met à jour les information d'un employé après modification par form POST
function edit($id, $nom, $prenom, $emp, $sup, $embauche, $sal, $comm)
{
    $db = connectBdd();
    $sql = "UPDATE emp SET  nom=$nom, prenom=$prenom, emploi=$emp, sup=$sup, embauche=$embauche, sal=$sal, comm=$comm  WHERE noemp=$id";
    mysqli_query($db, $sql);
}
//cette fonction rechereche un employé et retourne sa row dans un tableau associatif qui sera affiché sur la page profil
function afficher($id)
{
    $db = connectBdd();
    $rs = mysqli_query($db, "SELECT * FROM emp WHERE noemp=$id");
    $data = mysqli_fetch_array($rs, MYSQLI_ASSOC);
    return $data;
}
//fonction recupere toute la table emp et la retourne sous forme d'un array associatif
function rechercheEmp()
{

    $db = connectBdd();
    $rs = mysqli_query($db, 'SELECT * FROM emp');
    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    return $data;
}
//cette fonction verifie si le noemp correspond au num de superieur et retourne un booleen
function isServiceAffect($num)
{
    $db = connectBdd();
    $rs = mysqli_query($db, "SELECT*FROM emp  WHERE $num=sup");
    $data = mysqli_fetch_all($rs, MYSQLI_ASSOC);
    if (!empty($data)) {
        return TRUE;
    }
}
