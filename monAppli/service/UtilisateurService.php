<?php
include_once(__DIR__ . '/../dao/UtilisateurMysqliDao.php');
include_once __DIR__ . '/interfUtilServ.php';

/**
 * ici ce trouve la classe de la couche service qui s'ocupe de mettre la couche controlleur et dao en connection pour les utilisateurs
 */
class utilisateurService implements InterfUtilServ
{
    private $utilDao;

    public function __construct()
    {
        $this->utilDao = new UtilisateurMysqliDao();
    }
    /**
     * cette methode fait appel à la methode getConnectUser de la couche dao et retourne un Utilisateur
     *
     * @param string $mail
     * @return Utilisateur
     */
    public function getConnectU(?object $mail): ?object
    {
        return $this->utilDao->getConnectUser($mail);
    }

    /**
     * Undocumented function
     *
     * @param Utilisateur $utilisateur
     * @return void
     */
    public function setUserServ(?object $utilisateur): void
    {
        $this->utilDao->setUser($utilisateur);
    }

    /**
     * Get the value of utilDao
     */
    public function getutilDao()
    {
        return $this->utilDao;
    }

    /**
     * Set the value of utilDao
     *
     * @return  self
     */
    public function setutilDao(?object $utilDao)
    {
        $this->utilDao = $utilDao;

        return $this;
    }
}
