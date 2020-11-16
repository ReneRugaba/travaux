<?php
include_once(__DIR__ . '/../dao/ServiceMysqliDao.php');
include_once __DIR__ . '/interfService.php';

/**
 * ici ce trouve la classe de la couche service qui s'ocupe de mettre la couche controleur et dao en connection pour les services
 */
class ServiceService
{
    private $row;

    public function __construct()
    {
        $this->row = new ServiceMysqliDao();
    }
    /**
     * cette methode fait appel à la methode add de la couche dao et ne retourne rien
     *
     * @param Service2 $employe
     * @return void
     */
    public function Add(Service2 $employe): void
    {
        $this->row->add($employe);
    }

    /**
     *cette methode fait appel à la methode edith de la couche dao et ne retourne rien
     *
     * @param Service2 $service2
     * @return void
     */
    public  function modif(Service2 $service2): void
    {
        $this->row->update($service2);
    }

    /**
     * cette methode fait appel à la methode delete de la couche dao et ne retourne rien
     *
     * @param integer $id
     * @return void
     */
    public  function sup(int $id): void
    {
        $this->row->delete($id);
    }

    /**
     * cette methode fait appel à la methode rechercheserv de la couche dao et retourne un array
     *
     * @param integer $id
     * @return array
     */
    public  function recheById(int $id): object
    {
        return $this->row->rechercheById($id);
    }

    /**
     * cette methode fait appel à la methode afficheTab de la couche dao et retourne un array
     *
     * @return array
     */
    public function recherche(): array
    {
        return $this->row->searchAll();
    }

    /**
     * cette methode fait appel à la methode isservAffect de la couche dao et retourne un bool ou un null
     *
     * @param integer $id
     * @return boolean|null
     */
    public function affect(int $id): ?bool
    {
        return $this->row->Affect($id);
    }

    /**
     * cette methode fait appel à la methode rechercheserv de la couche dao et retourne un array
     *
     * @param integer $id
     * @return array
     */
    public function aff(int $id): object
    {
        return $this->row->rechercheById($id);
    }


    /**
     * Get the value of row
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * Set the value of row
     *
     * @return  self
     */
    public function setRow($row)
    {
        $this->row = $row;

        return $this;
    }
}
