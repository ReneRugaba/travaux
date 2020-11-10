<?php
include('connectbdd.php');


/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les utilisateurs
 */
class UtilisateurMysqliDao extends ConnectBdd
{
    /**
     * cette fonction s'occupe de chercher un utilisateur avec la colonne profil
     * @param string $nomcol
     * @return array
     */
    public function trouveUser(string $nomcol): array
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd(); //connection  la base de donnée
        $prepare = $db->prepare("select * from utilisateur where profil=?"); //preparation de la requette avant insertion
        $prepare->bind_param('s', $nomcol); //mis en correspondance du ? avec $nomcol
        $prepare->execute(); //execution de la requete
        $rs = $prepare->get_result(); //recupération du resultat de la requete
        $array = $rs->fetch_array(MYSQLI_ASSOC); //resultat mis dans un tableau associatif
        $rs->free(); //liberation memoire ressource
        $db->close(); //fermeture de la connection avec la base de donnée
        return $array; //retourne le tableau
    }

    /**
     * fonction qui insert dans la base de donnée un utilisateur
     *
     * @param string $mail
     * @param string $password
     * @return void
     */
    public function setUser(string $mail, string $password): void
    {

        $db = new ConnectBdd();
        $db = $db->connectBdd(); //connection  la base de donnée
        $prepare = $db->prepare("insert into utilisateur values(NULL,?,?,'utilisateur')"); //preparation de la requette avant insertion
        $prepare->bind_param("ss", $mail, $password); //mis en correspondance des ? avec $password et $mail
        $prepare->execute(); //execution de la requete
        $db->close(); //fermeture de la connection avec la base de donnée
    }

    /**
     * fonction qui recherche correspondance dans la base de donnée avec $mail
     *
     * @param string $mail
     * @return array
     */
    public function getConnectUser(string $mail): array
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd(); //connection  la base de donnée
        $req = $db->prepare("select * from utilisateur where username=?"); //preparation de la requette select
        $req->bind_param('s', $mail); //mis en correspondance du ? avec $mail
        $req->execute(); //execution de la requete
        $rs = $req->get_result(); //recupertion du resultat de la requete
        $array = $rs->fetch_array(MYSQLI_ASSOC); //resutat mis dans un tableau associatif
        if (!empty($array)) {
            return $array; //retourne un array
        } else {
            return $array = [];
        }
    }
}
