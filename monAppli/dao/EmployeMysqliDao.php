<?php
include_once __DIR__ . '/ConnectBaseDeDonnee.php';
include_once __DIR__ . '/../model/Employe.php';
include_once __DIR__ . '/InterfDao.php';
include_once __DIR__ .  '/ErreursDao.php';

/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les Employés
 */
class EmployeMysqliDao extends ConnectBaseDeDonnee implements InterfDao
{
    public function __construct()
    {
        $this->db = new ConnectBaseDeDonnee();
    }
    /**
     * cette fonction ajoute un employé dans la table emp
     * @param object $employe
     * @return void
     */
    public function add(object $employe): void
    {
        try {

            $bd = $this->db->connectionDataBase();
            $req = $bd->prepare("INSERT INTO emp VALUES(?,?,?,?,?,?,?,?,?)");
            $id = $employe->getNoemp();
            $nom = $employe->getNom();
            $prenom = $employe->getPrenom();
            $emp = $employe->getEmploi();
            $sup = $employe->getSup();
            $embauche = $employe->getEmbauche()->format("Y-m-d");
            $sal = $employe->getSal();
            $comm = $employe->getComm();
            $noser = $employe->getNoserv();

            $req->bindValue(1, $id, PDO::PARAM_INT);
            $req->bindValue(2, $nom);
            $req->bindValue(3, $prenom);
            $req->bindValue(4, $emp);
            $req->bindValue(5, $sup, PDO::PARAM_INT);
            $req->bindValue(6, $embauche);
            $req->bindValue(7, $sal, PDO::PARAM_INT);
            $req->bindValue(8, $comm, PDO::PARAM_INT);
            $req->bindValue(9, $noser, PDO::PARAM_INT);

            $req->execute();
        } catch (dataBasErreurs $f) {
            throw new ErreursDao($f);
        }
    }

    /**
     *cet fonction suprime la row d'un employé par ID=noemp
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("DELETE FROM emp WHERE noemp=?");
        $req->bindValue(1, $id);
        $req->execute();
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return object
     */
    public function rechercheById(int $id): object
    {
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("SELECT* FROM emp WHERE noemp=?");
        $req->bindValue(1, $id);
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $obj = new Employe2();
            $obj->setNoemp($value['noemp'])->setNom($value['nom'])->setPrenom($value['prenom'])
                ->setEmploi($value['emploi'])->setSup($value['sup'])->setEmbauche(new DateTime($value['embauche']))
                ->setSal($value['sal'])->setComm($value['comm'])->setNoserv($value['noserv']);
        }
        return $obj;
    }

    /**
     *cette fonction met à jour les information d'un employé après modification par form POST
     *
     * @param object $employe
     * @return void
     */
    public function update(object $employe): void
    {
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("UPDATE emp SET  nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?  WHERE noemp=?");
        $id = $employe->getNoemp();
        $nom = $employe->getNom();
        $prenom = $employe->getPrenom();
        $emp = $employe->getEmploi();
        $sup = $employe->getSup();
        $embauche = $employe->getEmbauche()->format('Y-m-d');
        $sal = $employe->getSal();
        $comm = $employe->getComm();

        $req->bindValue(1, $nom);
        $req->bindValue(2, $prenom);
        $req->bindValue(3, $emp);
        $req->bindValue(4, $sup, PDO::PARAM_INT);
        $req->bindValue(5, $embauche);
        $req->bindValue(6, $sal, PDO::PARAM_INT);
        $req->bindValue(7, $comm, PDO::PARAM_INT);
        $req->bindValue(8, $id, PDO::PARAM_INT);

        $req->execute();
    }

    /**
     *fonction recupere toute la table emp et la retourne sous forme d'un array associatif
     *
     * @return array
     */
    public function searchAll(): array
    {

        $db = $this->db->connectionDataBase();
        $req = $db->prepare('select * from emp');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $obj = new Employe2();
            $obj->setNoemp($value['noemp'])->setNom($value['nom'])->setPrenom($value['prenom'])
                ->setEmploi($value['emploi'])->setSup($value['sup'])->setEmbauche(new DateTime($value['embauche']))
                ->setSal($value['sal'])->setComm($value['comm'])->setNoserv($value['noserv']);
            $employes[] = $obj;
        }
        return $employes;
    }

    /**
     * Undocumented function
     *
     * @param integer $num
     * @return boolean|null
     */
    public function Affect(int $num): ?bool
    {
        $db = $this->db->connectionDataBase();
        $req = $db->prepare("SELECT*FROM emp  WHERE sup=?");
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
