<?php
include_once(__DIR__ . '/../dao/EmployeMysqliDao.php');
include_once __DIR__ . '/interfService.php';
/**
 * ici ce trouve la classe de la couche service qui s'ocupe de mettre la couche controlleur et dao en connection pour les employés
 */
class EmployeService implements interfService
{
    private $empDao;

    public function __construct()
    {
        $this->empDao = new EmployeMysqliDao();
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return Employe2
     */
    public  function aff(int $id): object
    {
        return $this->empDao->rechercheById($id);
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return Employe2
     */
    public function modif(int $id): object
    {
        return $this->empDao->rechercheById($id);
    }

    /**
     * cette methode fait appel à la methode delete de la couche dao et ne retourne rien
     *
     * @param integer $id
     * @return void
     */
    public function sup(int $id): void
    {
        $this->empDao->delete($id);
    }

    /**
     * cette methode fait appel à la methode edit de la couche dao et ne retourne rien
     *
     * @param Employe2 $employe
     * @return void
     */
    public function edit(object $employe): void
    {
        $this->empDao->update($employe);
    }

    /**
     * cette methode fait appel à la methode isSups de la couche dao et ne retourne rien
     *
     * @param integer $num
     * @return boolean|null
     */
    public function affect(int $num): ?bool
    {
        return $this->empDao->Affect($num);
    }

    /**
     * cette methode fait appel à la rechercheEmp  de la couche dao et ne retourne un array
     *
     * @return array
     */
    public function recherche(): array
    {
        return $this->empDao->searchAll();
    }

    /**
     * cette methode fait appel à la add de la couche dao et ne retourne un array
     *
     * @param Employe2 $employe2
     * @return void
     */
    public function Add(object $employe2): void
    {
        $this->empDao->add($employe2);
    }

    /**
     * Get the value of empDao
     */
    public function getempDao()
    {
        return $this->empDao;
    }

    /**
     * Set the value of empDao
     *
     * @return  self
     */
    public function setempDao($empDao)
    {
        $this->empDao = $empDao;

        return $this;
    }
}
