<?php
include_once('EmployeMysqliDao.php');

class EmployeService
{
    public static function aff(int $id): array
    {
        $row = new EmployeMysqliDao();
        $data = $row->afficher($id);
        return $data;
    }

    public static function modif(int $id): array
    {
        $row = new EmployeMysqliDao();
        $data = $row->rechercheEmpId($id);
        return $data;
    }

    public static function sup(int $id): void
    {
        $row = new EmployeMysqliDao();
        $row->delete($id);
    }
    public static function edit(Employe2 $employe): void
    {
        $data = new EmployeMysqliDao();
        $data->edit($employe);
    }

    public function affectEmp($num): ?bool
    {
        $empDao = new EmployeMysqliDao();
        $rep = $empDao->isServiceAffect($num);
        return $rep;
    }

    public function rechercheEmp(): array
    {
        $data = new EmployeMysqliDao();
        $data = $data->rechercheEmp();
        return $data;
    }

    public static function AddEmploye(Employe2 $employe2): void
    {
        $employe = new EmployeMysqliDao(); // je crée mon objet $employe en appellant ma class Employe2
        $employe->add($employe2);
    }
}
