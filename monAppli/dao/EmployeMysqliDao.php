<?php
include_once __DIR__ . '/ConnectBdd.php';
include_once __DIR__ . '/../model/Employe.php';
include_once __DIR__ . '/InterfDao.php';

/**
 * cette classe fait le lien avec la bdd et est la fille de la class bdd pour les Employés
 */
class EmployeMysqliDao extends ConnectBdd implements InterfDao
{
    /**
     * cette fonction ajoute un employé dans la table emp
     * @param object $employe
     * @return void
     */
    public function add(object $employe): void
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("INSERT INTO emp VALUES(?,?,?,?,?,?,?,?,?)");
        $id = $employe->getNoemp();
        $nom = $employe->getNom();
        $prenom = $employe->getPrenom();
        $emp = $employe->getEmploi();
        $sup = $employe->getSup();
        $embauche = $employe->getEmbauche()->format("Y-m-d");
        $sal = $employe->getSal();
        $comm = $employe->getComm();
        $noser = $employe->getNoserv();
        $req->bind_param(
            'isssisddi',
            $id,
            $nom,
            $prenom,
            $emp,
            $sup,
            $embauche,
            $sal,
            $comm,
            $noser
        );
        $req->execute();
        $db->close();
    }

    /**
     *cet fonction suprime la row d'un employé par ID=noemp
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("DELETE FROM emp WHERE noemp=?");
        $req->bind_param('i', $id);
        $req->execute();
        $db->close();
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return object
     */
    public function rechercheById(int $id): object
    {
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("SELECT* FROM emp WHERE noemp=?");
        $req->bind_param('i', $id);
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        $obj = new Employe2();
        $obj->setNoemp($data['noemp'])->setNom($data['nom'])->setPrenom($data['prenom'])
            ->setEmploi($data['emploi'])->setSup($data['sup'])->setEmbauche(new DateTime($data['embauche']))
            ->setSal($data['sal'])->setComm($data['comm'])->setNoserv($data['noserv']);
        $rs->free();
        $db->close();
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
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("UPDATE emp SET  nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?  WHERE noemp=?");
        $id = $employe->getNoemp();
        $nom = $employe->getNom();
        $prenom = $employe->getPrenom();
        $emp = $employe->getEmploi();
        $sup = $employe->getSup();
        $embauche = $employe->getEmbauche()->format('Y-m-d');
        $sal = $employe->getSal();
        $comm = $employe->getComm();

        $req->bind_param(
            'sssisddi',
            $nom,
            $prenom,
            $emp,
            $sup,
            $embauche,
            $sal,
            $comm,
            $id
        );
        $req->execute();
        $db->close();
    }

    /**
     *fonction recupere toute la table emp et la retourne sous forme d'un array associatif
     *
     * @return array
     */
    public function searchAll(): array
    {

        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare('select * from emp');
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $employes = [];
        foreach ($data as $value) {
            $obj = new Employe2();
            $obj->setNoemp($value['noemp'])->setNom($value['nom'])->setPrenom($value['prenom'])
                ->setEmploi($value['emploi'])->setSup($value['sup'])->setEmbauche(new DateTime($value['embauche']))
                ->setSal($value['sal'])->setComm($value['comm'])->setNoserv($value['noserv']);
            $employes[] = $obj;
        }


        $rs->free();
        $db->close();
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
        $db = new ConnectBdd();
        $db = $db->connectBdd();
        $req = $db->prepare("SELECT*FROM emp  WHERE sup=?");
        $req->bind_param('i', $num);
        $req->execute();
        $rs = $req->get_result();
        $data = $rs->fetch_array(MYSQLI_ASSOC);
        $rs->free();
        $db->close();
        if (!empty($data)) {
            return TRUE;
        } else {
            return null;
        }
    }
}
