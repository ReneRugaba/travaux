<?php
include_once(__DIR__ . '/../dao/UtilisateurMysqliDao.php');

/**
 * ici ce trouve la classe de la couche service qui s'ocupe de mettre la couche controlleur et dao en connection pour les utilisateurs
 */
class utilisateurService
{
    /**
     * cette methode fait appel à la methode getConnectUser de la couche dao et retourne un array
     *
     * @param string $mail
     * @return array
     */
    public static function getConnectU(Utilisateur $mail): Utilisateur
    {
        $row = new UtilisateurMysqliDao();
        return $row->getConnectUser($mail);
    }

    /**
     * cette methode fait appel à la methode setUser de la couche dao et ne retourne rien
     *
     * @param string $mail
     * @param string $pass
     * @return void
     */
    public static function setUserServ(Utilisateur $utilisateur): void
    {
        $row = new UtilisateurMysqliDao();
        $row->setUser($utilisateur);
    }
}
