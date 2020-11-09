<?php
include_once('UtilisateurMysqliDao.php');
class utilisateurService
{
    public function getConnectU(string $mail)
    {
        $row = new UtilisateurMysqliDao();
        return $row->getConnectUser($mail);
    }

    public function setUserServ(string $mail, string $pass)
    {
        $row = new UtilisateurMysqliDao();
        $row->setUser($mail, $pass);
    }
}
