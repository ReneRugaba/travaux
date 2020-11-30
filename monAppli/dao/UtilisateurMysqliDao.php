<?php
include('ConnectBaseDeDonnee.php');
include_once __DIR__ . '/../model/Utilisateur.php';
include_once __DIR__ . '/interfUtilisateur.php';
require_once __DIR__ . '/ErreursDao.php';

/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les utilisateurs
 */
class UtilisateurMysqliDao extends ConnectBaseDeDonnee implements interfUtilisateur
{
    public function __construct()
    {
        $this->db = new ConnectBaseDeDonnee();
    }

    /**
     * Undocumented function
     *
     * @param Utilisateur $utilisateur
     * @return void
     */
    public function setUser(object $utilisateur): void
    {


        $db = $this->db->connectionDataBase(); //connection  la base de donnée
        $stm = $db->prepare("insert into utilisateur values(NULL,?,?,'utilisateur')"); //preparation de la requette avant insertion
        $mail = $utilisateur->getEmail();
        $password = $utilisateur->getPassWord();
        $stm->bindValue(1, $mail); //mis en correspondance des ? avec $password et $mail
        $stm->bindValue(2, $password); //mis en correspondance des ? avec $password et $mail
        $stm->execute(); //execution de la requete
        //fermeture de la connection avec la base de donnée
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
            $db = $this->db->connectionDataBase();
            $req = 'SELECT * FROM utilisateur WHERE username=?';
            $stm = $db->prepare($req);
            $mail = $object->getEmail();
            $stm->bindValue(1, $mail);
            $stm->execute();
            $array = $stm->FetchAll(PDO::FETCH_ASSOC);
            if ($array) {
                foreach ($array as $value) {
                    $obj = new Utilisateur();
                    $obj->setEmail($value['username'])->setPassWord($value['password'])->setProfil($value['profil']);
                }
                if (!empty($array)) {
                    return $obj; //retourne un array
                }
            } else {
                return null;
            }
        } catch (PDOException $f) {
            throw new ErreursDao($f);
        }
    }
}
