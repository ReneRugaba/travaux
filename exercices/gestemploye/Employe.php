<?php
include_once('DateTofrench.php');

abstract class Employe
{
    private $matricule;
    private $nom;
    private $prenom;
    private $dateN;

    /*
    constructeur
    */
    public function __construct(string $matricule, string $nom, string $prenom, DateTime $dateN)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateN = $dateN;
    }
    /*
    get and set
    */

    /**
     * Get the value of matricule
     */
    public function getMatricule(): string
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */
    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of dateN
     */
    public function getDateN(): DateTime
    {
        return $this->dateN;
    }

    /**
     * Set the value of dateN
     *
     * @return  self
     */
    public function setDateN(DateTime $dateN): self
    {
        $this->dateN = $dateN;

        return $this;
    }

    /*
    abstract function
    */
    public abstract function calculSalaire(): float;


    /*
    toString()
    */
    public function __toString()
    {
        $dt = new DateToFrench($this->dateN->format('l d F Y'));
        return "{matricule:} " . $this->matricule . "  {nom:} " . $this->nom . " {prenom} " . $this->prenom . " {date de naissance:} " . $dt->forma('l d F Y');
    }
}
