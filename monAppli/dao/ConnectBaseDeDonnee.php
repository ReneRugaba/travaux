<?php
require_once __DIR__ . '/dataBasErreurs.php';

class ConnectBaseDeDonnee
{

    /**
     * cette methode gere la connection à la base de donnéé pour chaque methode de l'appli
     *
     * @return mysqli
     */
    public function connectionDataBase()
    {
        $mysql = 'mysql:host=localhost;dbname=gestionemploye';
        $user = 'root';
        $password = '';

        try {
            return new PDO($mysql, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); //ici je fais appel à la class PDO
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
