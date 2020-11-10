<?php
include_once __DIR__ . '/ConnectBdd.php';

/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les Services
 */
class ServiceMysqliDao extends ConnectBdd
{
    /**
     *cette fonction ajoute un nouveau serv dans la table serv
     *
     * @param Service2 $service2
     * @return void
     */
    public function add(Service2 $service2): void
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("INSERT INTO serv VALUES(?,?,?)");
        $noser = $service2->getNoserv();
        $serv = $service2->getService();
        $ville = $service2->getVille();
        $req->bind_param(
            'iss',
            $noser,
            $serv,
            $ville
        );
        $req->execute();
        $db->close();
    }

    /** 
     *cet fonction suprime la row d'un serv par ID=noserv
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("DELETE FROM serv WHERE noserv=?");
        $req->bind_param('i', $id);
        $req->execute();
        $db->close();
    }

    /** 
     *cette fonction cherche la row d'un serv et la retourne dans un tableau assoc pour etre afficher dans servinf.php
     *
     * @param integer $id
     * @return array
     */
    public function rechercheserv(int $id): array
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("SELECT * FROM serv WHERE noserv=?");
        $req->bind_param('i', $id);
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $db->close();
        return $data;
    }

    /** 
     *cette fonction met à jour les information d'un serv après modification par form vis à  POST
     *
     * @param Service2 $service2
     * @return void
     */
    public function edit(Service2 $service2): void
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("UPDATE serv SET  service=?, ville=? WHERE noserv=?");
        $serv = $service2->getService();
        $ville = $service2->getVille();
        $id = $service2->getNoserv();
        $req->bind_param(
            'ssi',
            $serv,
            $ville,
            $id
        );
        $req->execute();
        $db->close();
    }


    /** 
     *fonction recupere toute la table serv et la retourne sous forme d'un array associatif
     *
     * @return array
     */
    public function afficheTab(): array
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare('SELECT * FROM serv');
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $db->close();
        return $data;
    }

    /** 
     *cette fonction verifie si le noserv, dans la table serv, correspond au noserv, dans emp, par jointure et retourne un booleen
     *
     * @param integer $num
     * @return boolean
     */
    public function isservAffect(int $num)
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("SELECT*FROM emp AS A INNER JOIN serv AS B ON A.noserv=B.noserv WHERE A.noserv=?");
        $req->bind_param('i', $num);
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        if (!empty($data)) {
            return TRUE;
        } else {
            return null;
        }
    }
}
