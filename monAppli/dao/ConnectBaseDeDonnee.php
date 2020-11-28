<?php
require_once __DIR__ . '/dataBasErreursException.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class ConnectBaseDeDonnee
{

    /**
     * cette methode gere la connection à la base de donnéé pour chaque methode de l'appli
     *
     * @return mysqli
     */
    public function connectionDataBase()
    {
        $mysql = 'localhost';
        $user = 'malakaie';
        $password = '123456';
        $bdd = 'gestionemploye';
        try {
            return new mysqli($mysql, $user, $password, $bdd); //ici je fais appel à la class mysqli
        } catch (mysqli_sql_exception $e) {
            throw new dataBasErreursException($e->getMessage(), $e->getCode());
        }
    }
}
