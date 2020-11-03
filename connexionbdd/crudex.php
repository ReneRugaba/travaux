<?php

/**
 * cette fonction s'occupe de chercher un utilisateur avec la colonne profil
 * @param string $nomcol
 * @return array
 */
function trouveUser(string $nomcol): array
{
    $mysqli = new mysqli('localhost', 'malakaie', '123456', 'gestionemploye'); //connection  la base de donnée
    $prepare = $mysqli->prepare("select * from utilisateur where profil=?"); //preparation de la requette avant insertion
    $prepare->bind_param('s', $nomcol); //mis en correspondance du ? avec $nomcol
    $prepare->execute(); //execution de la requete
    $rs = $prepare->get_result(); //recupération du resultat de la requete
    $array = $rs->fetch_array(MYSQLI_ASSOC); //resultat mis dans un tableau associatif
    $rs->free(); //liberation memoire ressource
    $mysqli->close(); //fermeture de la connection avec la base de donnée
    return $array; //retourne le tableau
}

/**
 * fonction qui insert dans la base de donnée un utilisateur
 *
 * @param string $mail
 * @param string $password
 * @return void
 */
function setUser(string $mail, string $password): void
{

    $mysqli = new mysqli('localhost', 'malakaie', '123456', 'gestionemploye'); //connection  la base de donnée
    $prepare = $mysqli->prepare("insert into utilisateur values(NULL,?,?,'utilisateur')"); //preparation de la requette avant insertion
    $prepare->bind_param("ss", $mail, $password); //mis en correspondance des ? avec $password et $mail
    $prepare->execute(); //execution de la requete
    $mysqli->close(); //fermeture de la connection avec la base de donnée
}

/**
 * fonction qui recherche correspondance dans la base de donnée avec $mail
 *
 * @param string $mail
 * @return array
 */
function getConnectUser(string $mail): array
{
    $mysqli = new mysqli('localhost', 'malakaie', '123456', 'gestionemploye'); //connection  la base de donnée
    $req = $mysqli->prepare("select * from utilisateur where username=?"); //preparation de la requette select
    $req->bind_param('s', $mail); //mis en correspondance du ? avec $mail
    $req->execute(); //execution de la requete
    $rs = $req->get_result(); //recupertion du resultat de la requete
    $array = $rs->fetch_array(MYSQLI_ASSOC); //resutat mis dans un tableau associatif
    return $array; //retourne un array
}
