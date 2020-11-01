<?php
include_once('Employe.php');

class CadreSup extends Employe
{
    private $ind;

    /**
     * construct
     */
    public function __construct(string $matricule, string $nom, string $prenom, DateTime $dateN, int $ind)
    {
        parent::__construct($matricule, $nom, $prenom, $dateN);
        $this->ind = $ind;
    }


    /**
     * Get the value of ind
     */
    public function getInd(): int
    {
        return $this->ind;
    }

    /**
     * Set the value of ind
     *
     * @return  self
     */
    public function setInd(int $ind): self
    {
        $this->ind = $ind;

        return $this;
    }

    /**
     * calculSalaire()
     */
    public function calculSalaire(): float
    {
        if ($this->ind == 1) {
            return 13000;
        } elseif ($this->ind == 2) {
            return 15000;
        } elseif ($this->ind == 3) {
            return 17000;
        } elseif ($this->ind == 4) {
            return 20000;
        }
    }

    /**
     * toString()
     */
    public function __toString()
    {
        return parent::__toString() . " {salaire:} " . $this->calculSalaire();
    }
}
