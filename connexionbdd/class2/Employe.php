<?php
include_once("Personne.php");

class Employe extends Personne{
    protected $salaire;

    public function __construct($id,$nom,$prenom,$salaire)
    {
        parent:: __construct($id,$nom,$prenom);
        $this->salaire=$salaire;
    }
    

    /**
     * Get the value of salaire
     */ 
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set the value of salaire
     *
     * @return  self
     */ 
    public function setSalaire( $salaire):self
    {
        $this->salaire = $salaire;

        return $this;
    }

    // accesseur
    public function __toString(){
        return "personne: " .parent:: __toString(). " {salaire}: ". $this->salaire;
    }
}