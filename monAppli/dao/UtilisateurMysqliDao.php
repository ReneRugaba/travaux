<?php
include('ConnectBaseDeDonnee.php');
include_once __DIR__ . '/../model/Utilisateur.php';
include_once __DIR__ . '/interfUtilisateur.php';
require_once __DIR__ . '/ErreursExceptDao.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les utilisateurs
 */
class UtilisateurMysqliDao extends ConnectBaseDeDonnee implements interfUtilisateur
{
    /**
     * cette fonction s'occupe de chercher un utilisateur avec la colonne profil
     * @param string $nomcol
     * @return array
     */
    public function trouveUser(string $nomcol): array
    {
        $db = new ConnectBaseDeDonnee();
        $db = $db->connectionDataBase(); //connection  la base de donnée
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
     * Undocumented function
     *
     * @param Utilisateur $utilisateur
     * @return void
     */
    public function setUser(object $utilisateur): void
    {

        $db = new ConnectBaseDeDonnee();
        $db = $db->connectionDataBase(); //connection  la base de donnée
        $prepare = $db->prepare("insert into utilisateur values(NULL,?,?,'utilisateur')"); //preparation de la requette avant insertion
        $mail = $utilisateur->getEmail();
        $password = $utilisateur->getPassWord();
        $prepare->bind_param("ss", $mail, $password); //mis en correspondance des ? avec $password et $mail
        $prepare->execute(); //execution de la requete
        $db->close(); //fermeture de la connection avec la base de donnée
    }

    /**
     * Undocumented function
     *
     * @param Utilisateur $mail
     * @return Utilisateur|null
     */
    public function getConnectUser(object $object): ?object
    {
        try {
            $db = new ConnectBaseDeDonnee();
            $db = $db->connectionDataBase(); //connection  la base de donnée
            $req = $db->prepare("select * from utilisateur where username=?"); //preparation de la requette prepare
            $email = $object->getEmail();
            $req->bind_param('s', $email); //mis en correspondance du ? avec $mail
            $req->execute(); //execution de la requete
            $rs = $req->get_result(); //recupertion du resultat de la requete
            $array = $rs->fetch_array(MYSQLI_ASSOC); //resutat mis dans un tableau associatif
        } catch (dataBasErreursException $f) {
            throw new ErreursExceptDao($f->getMessage(), $f->getCode());
        }
        if ($array) {
            $obj = new Utilisateur();
            $obj->setEmail($array['username'])->setPassWord($array['password'])->setProfil($array['profil']);
            if (!empty($array)) {
                return $obj; //retourne un array
            }
        } else {
            return null;
        }
    }
}
