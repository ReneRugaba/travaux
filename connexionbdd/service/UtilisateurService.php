<?php
include_once(__DIR__ . '/../dao/UtilisateurMysqliDao.php');
class utilisateurService
{
    public function getConnectU(string $mail): array
    {
        $row = new UtilisateurMysqliDao();
        return $row->getConnectUser($mail);
    }

    public function setUserServ(string $mail, string $pass): void
    {
        $row = new UtilisateurMysqliDao();
        $row->setUser($mail, $pass);
    }
}
