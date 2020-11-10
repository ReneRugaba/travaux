<?php
include_once('Employe.php');

class Pdg extends Employe
{
    private $chA;


    /**
     * contruct
     */
    public function __construct(string $matricule, string $nom, string $prenom, DateTime $dateN, float $chA)
    {
        parent::__construct($matricule, $nom, $prenom, $dateN);
        $this->chA = $chA;
    }

    /**
     * Get the value of chA
     */
    public function getChA(): float
    {
        return $this->chA;
    }

    /**
     * Set the value of chA
     *
     * @return  self
     */
    public function setChA(float $chA): self
    {
        $this->chA = $chA;

        return $this;
    }

    /**
     * implement function
     */
    public function calculSalaire(): float
    {
        return $this->chA * 35 / 100;
    }

    /**
     * toString()
     */
    public function __toString()
    {
        return parent::__toString() . " {salaire:} " . $this->calculSalaire();
    }
}
