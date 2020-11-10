<?php

include_once("Personne1.php");

class Developpeur extends Personne
{
    private $specialite;

    public function __construct(int $id, string $nom, string $prenom, string $mail, string $telephone, float $salaire, $specialite)
    {
        parent::__construct($id, $nom, $prenom, $mail, $telephone, $salaire, $specialite);
        $this->specialite = $specialite;
    }

    /**
     * Get the value of specialite
     */
    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    /**
     * Set the value of specialite
     *
     * @return  self
     */
    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function calculSalaire(): float
    {
        return $this->salaire * 1.2;
    }

    public function affiche(): string
    {
        return $this;
    }

    public function __toString()
    {
        return parent::__toString() . "{specialité}; " . $this->specialite;
    }
}
