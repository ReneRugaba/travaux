<?php
require_once __DIR__ . '/bddErreursException.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class ConnectBdd
{

    /**
     * cette methode gere la connection à la base de donnéé pour chaque methode de l'appli
     *
     * @return mysqli
     */
    public function connectBdd()
    {
        $mysql = 'localhost';
        $user = 'malakaie';
        $password = '1234565';
        $bdd = 'gestionemploye';
        try {
            return new mysqli($mysql, $user, $password, $bdd); //ici je fais appel à la class mysqli
        } catch (mysqli_sql_exception $e) {
            throw new bddErreursException($e->getMessage(), $e->getCode());
        }
    }
}
