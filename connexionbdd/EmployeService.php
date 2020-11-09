<?php
include_once('Employe2.php');
include_once('EmployeMysqliDao.php');

class EmployeService
{
    public static function aff(int $id)
    {
        $row = new EmployeMysqliDao();
        $data = $row->afficher($id);
        return $data;
    }

    public static function modif(int $id)
    {
        $row = new EmployeMysqliDao();
        $data = $row->rechercheEmpId($id);
        return $data;
    }

    public static function sup(int $id)
    {
        $row = new EmployeMysqliDao();
        $row->delete($id);
    }
    public static function edit(Employe2 $employe)
    {
        $data = new EmployeMysqliDao();
        $data->edit($employe);
    }

    public function affectEmp($num)
    {
        $empDao = new EmployeMysqliDao();
        $rep = $empDao->isServiceAffect($num);
        return $rep;
    }

    public function rechercheEmp()
    {
        $data = new EmployeMysqliDao();
        $data = $data->rechercheEmp();
        return $data;
    }

    public static function AddEmploye(Employe2 $employe2)
    {
        $employe = new EmployeMysqliDao(); // je crée mon objet $employe en appellant ma class Employe2
        $employe->add($employe2);
    }
}
