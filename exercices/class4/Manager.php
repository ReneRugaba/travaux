<?php

include_once('Personne1.php');

class Manager extends Personne
{
    private $service;

    public function __construct(int $id, string $nom, string $prenom, string $mail, string $telephone, float $salaire, $service)
    {
        parent::__construct($id,$nom,$prenom,$mail,$telephone,$salaire,$service);
        $this->service = $service;
    }



    /**
     * Get the value of service
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */
    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function calculSalaire(): float
    {
        return $this->salaire * 1.35;
    }

    public function affiche(): string
    {
        return $this->service;
    }
}
