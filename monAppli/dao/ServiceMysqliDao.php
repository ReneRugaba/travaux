<?php
include_once __DIR__ . '/ConnectBdd.php';
include_once __DIR__ . '/../model/Service.php';
include_once __DIR__ . '/InterfDao.php';

/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les Services
 */
class ServiceMysqliDao extends ConnectBdd implements InterfDao
{
    /**
     *cette fonction ajoute un nouveau serv dans la table serv
     *
     * @param object $service2
     * @return void
     */
    public function add(object $service2): void
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
     * @return object
     */
    public function rechercheById(int $id): object
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("SELECT * FROM serv WHERE noserv=?");
        $req->bind_param('i', $id);
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        $obj = new Service2();
        $obj->setNoserv($data['noserv'])->setService($data['service'])->setVille($data['ville']);
        $rs->free();
        $db->close();
        return $obj;
    }

    /** 
     *cette fonction met à jour les information d'un serv après modification par form vis à  POST
     *
     * @param object $service2
     * @return void
     */
    public function update(object $service2): void
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
    public function searchAll(): array
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare('SELECT * FROM serv');
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $services = [];
        foreach ($data as $value) {
            $obj = new Service2();
            $obj->setNoserv($value['noserv'])->setService($value['service'])->setVille($value['ville']);
            $services[] = $obj;
        }

        $rs->free();
        $db->close();
        return $services;
    }

    /** 
     *cette fonction verifie si le noserv, dans la table serv, correspond au noserv, dans emp, par jointure et retourne un booleen
     *
     * @param integer $num
     * @return boolean
     */
    public function Affect(int $num): ?bool
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
