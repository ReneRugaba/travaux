<?php
include_once __DIR__ . '/ConnectBaseDeDonnee.php';
include_once __DIR__ . '/../model/Service.php';
include_once __DIR__ . '/InterfDao.php';

/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les Services
 */
class ServiceMysqliDao extends ConnectBaseDeDonnee implements InterfDao
{
    public function __construct()
    {
        $this->db = new ConnectBaseDeDonnee();
    }
    /**
     *cette fonction ajoute un nouveau serv dans la table serv
     *
     * @param object $service2
     * @return void
     */
    public function add(object $service2): void
    {
        try {
            $db = $this->db->connectionDataBase();
            $req = $db->prepare("INSERT INTO serv VALUES(?,?,?)");
            $noser = $service2->getNoserv();
            $serv = $service2->getService();
            $ville = $service2->getVille();
            $req->bindValue(1, $noser, PDO::PARAM_INT);
            $req->bindValue(2, $serv);
            $req->bindValue(3, $ville);
            $req->execute();
        } catch (dataBasErreurs $e) {
            new ErreursDao($e->getCode(), $e->getMessage());
        }
    }

    /** 
     *cet fonction suprime la row d'un serv par ID=noserv
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("DELETE FROM serv WHERE noserv=?");
        $req->bindValue(1, $id);
        $req->execute();
    }

    /** 
     *cette fonction cherche la row d'un serv et la retourne dans un tableau assoc pour etre afficher dans servinf.php
     *
     * @param integer $id
     * @return object
     */
    public function rechercheById(int $id): object
    {
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("SELECT * FROM serv WHERE noserv=?");
        $req->bindValue(1, $id);
        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $obj = new Service2();
            $obj->setNoserv($value['noserv'])->setService($value['service'])->setVille($value['ville']);
        }
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
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("UPDATE serv SET  service=?, ville=? WHERE noserv=?");
        $serv = $service2->getService();
        $ville = $service2->getVille();
        $id = $service2->getNoserv();

        $req->bindValue(1, $serv);
        $req->bindValue(2, $ville);
        $req->bindValue(3, $id, PDO::PARAM_INT);
        $req->execute();
    }


    /** 
     *fonction recupere toute la table serv et la retourne sous forme d'un array associatif
     *
     * @return array
     */
    public function searchAll(): array
    {
        $db = $this->db->connectionDataBase();
        $req = $db->prepare('SELECT * FROM serv');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $services = [];
        foreach ($data as $value) {
            $obj = new Service2();
            $obj->setNoserv($value['noserv'])->setService($value['service'])->setVille($value['ville']);
            $services[] = $obj;
        }
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
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("SELECT*FROM emp AS A INNER JOIN serv AS B ON A.noserv=B.noserv WHERE A.noserv=?");
        $req->bindValue(1, $num);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($data)) {
            return TRUE;
        } else {
            return null;
        }
    }
}
