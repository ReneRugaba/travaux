<?php
include_once('ServiceMysqliDao.php');

class ServiceService
{
    public static function ajout(Service2 $employe): void
    {
        $row = new ServiceMysqliDao();
        $row->add($employe);
    }

    public static function modiff(Service2 $service2): void
    {
        $row = new ServiceMysqliDao();
        $row->edit($service2);
    }

    public static function sup(int $id): void
    {
        $row = new ServiceMysqliDao();
        $row->delete($id);
    }

    public static function recheById(int $id): array
    {
        $serv = new ServiceMysqliDao();
        $row = $serv->rechercheserv($id);
        return $row;
    }

    public function afficheServ(): array
    {
        $data = new ServiceMysqliDao();
        return $data->afficheTab();
    }

    public function isservAf(int $id): bool
    {
        $data = new ServiceMysqliDao();
        return $data->isservAffect($id);
    }

    public function recherById(int $id): array
    {
        $serv = new ServiceMysqliDao();
        return $serv->rechercheserv($id);
    }
}
