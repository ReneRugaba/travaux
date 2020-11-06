<?php
include("connectbdd.php"); // connection à la base de donnée

//cette fonction ajoute un employé dans la table emp
function add(Employe2 $employe)
{
    $db = connectBdd();
    $req = $db->prepare("INSERT INTO emp VALUES(?,?,?,?,?,?,?,?,?)");
    $id = $employe->getNoemp();
    $nom = $employe->getNom();
    $prenom = $employe->getPrenom();
    $emp = $employe->getEmploi();
    $sup = $employe->getSup();
    $embauche = $employe->getEmbauche()->format("Y-m-d");
    $sal = $employe->getSal();
    $comm = $employe->getComm();
    $noser = $employe->getNoserv();
    $req->bind_param(
        'isssisddi',
        $id,
        $nom,
        $prenom,
        $emp,
        $sup,
        $embauche,
        $sal,
        $comm,
        $noser
    );
    $req->execute();
    $db->close();
}
//cet fonction suprime la row d'un employé par ID=noemp
function delete($id)
{
    $db = connectBdd();
    $req = $db->prepare("DELETE FROM emp WHERE noemp=?");
    $req->bind_param('i', $id);
    $req->execute();
    $db->close();
}
//cette fonction retoune la row d'un employé dans le formulaire de modification
function rechercheEmpId($id)
{
    $db = connectBdd();
    $req = $db->prepare("SELECT* FROM emp WHERE noemp=?");
    $req->bind_param('i', $id);
    $req->execute();
    $rs = $req->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    return $data;
}
// cette fonction met à jour les information d'un employé après modification par form POST
function edit(Employe2 $employe)
{
    $db = connectBdd();
    $req = $db->prepare("UPDATE emp SET  nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?  WHERE noemp=?");
    $id = $employe->getNoemp();
    $nom = $employe->getNom();
    $prenom = $employe->getPrenom();
    $emp = $employe->getEmploi();
    $sup = $employe->getSup();
    $embauche = $employe->getEmbauche()->format('Y-m-d');
    $sal = $employe->getSal();
    $comm = $employe->getComm();

    $req->bind_param(
        'sssisddi',
        $nom,
        $prenom,
        $emp,
        $sup,
        $embauche,
        $sal,
        $comm,
        $id
    );
    $req->execute();
    $db->close();
}
//cette fonction rechereche un employé et retourne sa row dans un tableau associatif qui sera affiché sur la page profil
function afficher($id)
{
    $db = connectBdd();
    $req = $db->prepare("select * from emp where noemp=?");
    $req->bind_param('i', $id);
    $req->execute();
    $rs = $req->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    return $data;
}
//fonction recupere toute la table emp et la retourne sous forme d'un array associatif
function rechercheEmp()
{

    $db = connectBdd();
    $req = $db->prepare('select * from emp');
    $req->execute();
    $rs = $req->get_result();
    $data = $rs->fetch_all(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    return $data;
}
//cette fonction verifie si le noemp correspond au num de superieur et retourne un booleen
function isServiceAffect($num)
{
    $db = connectBdd();
    $req = $db->prepare("SELECT*FROM emp  WHERE sup=?");
    $req->bind_param('i', $num);
    $req->execute();
    $rs = $req->get_result();
    $data = $rs->fetch_array(MYSQLI_ASSOC);
    $rs->free();
    $db->close();
    if (!empty($data)) {
        return TRUE;
    }
}
