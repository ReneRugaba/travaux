<?php

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
        $password = '123456';
        $bdd = 'gestionemploye';
        $db = new mysqli($mysql, $user, $password, $bdd); //ici je fais appel à la class mysqli
        return $db; // je retourene cet objet de connexion ici
    }
}
