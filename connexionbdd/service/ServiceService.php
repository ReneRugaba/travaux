<?php
include_once(__DIR__ . '/../dao/ServiceMysqliDao.php');

/**
 * ici ce trouve la classe de la couche service qui s'ocupe de mettre la couche controleur et dao en connection pour les services
 */
class ServiceService
{
    /**
     * cette methode fait appel à la methode add de la couche dao et ne retourne rien
     *
     * @param Service2 $employe
     * @return void
     */
    public static function ajout(Service2 $employe): void
    {
        $row = new ServiceMysqliDao();
        $row->add($employe);
    }

    /**
     *cette methode fait appel à la methode edith de la couche dao et ne retourne rien
     *
     * @param Service2 $service2
     * @return void
     */
    public static function modiff(Service2 $service2): void
    {
        $row = new ServiceMysqliDao();
        $row->update($service2);
    }

    /**
     * cette methode fait appel à la methode delete de la couche dao et ne retourne rien
     *
     * @param integer $id
     * @return void
     */
    public static function sup(int $id): void
    {
        $row = new ServiceMysqliDao();
        $row->delete($id);
    }

    /**
     * cette methode fait appel à la methode rechercheserv de la couche dao et retourne un array
     *
     * @param integer $id
     * @return array
     */
    public static function recheById(int $id): Service2
    {
        $serv = new ServiceMysqliDao();
        $row = $serv->rechercheById($id);
        return $row;
    }

    /**
     * cette methode fait appel à la methode afficheTab de la couche dao et retourne un array
     *
     * @return array
     */
    public function afficheServ(): array
    {
        $data = new ServiceMysqliDao();
        return $data->searchAll();
    }

    /**
     * cette methode fait appel à la methode isservAffect de la couche dao et retourne un bool ou un null
     *
     * @param integer $id
     * @return boolean|null
     */
    public function isservAf(int $id): ?bool
    {
        $data = new ServiceMysqliDao();
        return $data->Affect($id);
    }

    /**
     * cette methode fait appel à la methode rechercheserv de la couche dao et retourne un array
     *
     * @param integer $id
     * @return array
     */
    public function recherById(int $id): Service2
    {
        $serv = new ServiceMysqliDao();
        return $serv->rechercheById($id);
    }
}
