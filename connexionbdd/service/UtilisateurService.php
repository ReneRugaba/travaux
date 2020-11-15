<?php
include_once(__DIR__ . '/../dao/UtilisateurMysqliDao.php');

/**
 * ici ce trouve la classe de la couche service qui s'ocupe de mettre la couche controlleur et dao en connection pour les utilisateurs
 */
class utilisateurService
{
    /**
     * cette methode fait appel à la methode getConnectUser de la couche dao et retourne un Utilisateur
     *
     * @param string $mail
     * @return Utilisateur
     */
    public static function getConnectU(Utilisateur $mail): Utilisateur
    {
        $row = new UtilisateurMysqliDao();
        return $row->getConnectUser($mail);
    }

    /**
     * Undocumented function
     *
     * @param Utilisateur $utilisateur
     * @return void
     */
    public static function setUserServ(Utilisateur $utilisateur): void
    {
        $row = new UtilisateurMysqliDao();
        $row->setUser($utilisateur);
    }
}
