<?php
include_once(__DIR__ . '/../dao/EmployeMysqliDao.php');
/**
 * ici ce trouve la classe de la couche service qui s'ocupe de mettre la couche controlleur et dao en connection pour les employés
 */
class EmployeService
{
    /**
     * Undocumented function
     *
     * @param integer $id
     * @return Employe2
     */
    public static function aff(int $id): Employe2
    {
        $row = new EmployeMysqliDao();
        $data = $row->rechercheById($id);
        return $data;
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return Employe2
     */
    public static function modif(int $id): Employe2
    {
        $row = new EmployeMysqliDao();
        $data = $row->rechercheById($id);
        return $data;
    }

    /**
     * cette methode fait appel à la methode delete de la couche dao et ne retourne rien
     *
     * @param integer $id
     * @return void
     */
    public static function sup(int $id): void
    {
        $row = new EmployeMysqliDao();
        $row->delete($id);
    }

    /**
     * cette methode fait appel à la methode edit de la couche dao et ne retourne rien
     *
     * @param Employe2 $employe
     * @return void
     */
    public static function edit(Employe2 $employe): void
    {
        $data = new EmployeMysqliDao();
        $data->update($employe);
    }

    /**
     * cette methode fait appel à la methode isSups de la couche dao et ne retourne rien
     *
     * @param integer $num
     * @return boolean|null
     */
    public function affectEmp(int $num): ?bool
    {
        $empDao = new EmployeMysqliDao();
        $rep = $empDao->Affect($num);
        return $rep;
    }

    /**
     * cette methode fait appel à la rechercheEmp  de la couche dao et ne retourne un array
     *
     * @return array
     */
    public function rechercheEmp(): array
    {
        $data = new EmployeMysqliDao();
        return $data->searchAll();
    }

    /**
     * cette methode fait appel à la add de la couche dao et ne retourne un array
     *
     * @param Employe2 $employe2
     * @return void
     */
    public static function AddEmploye(Employe2 $employe2): void
    {
        $employe = new EmployeMysqliDao(); // je crée mon objet $employe en appellant ma class Employe2
        $employe->add($employe2);
    }
}
