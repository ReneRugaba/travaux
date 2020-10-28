<?php
include_once('Employe.php');

class Professeur extends Employe{
    private $specialite;


    public function __construct($id,$nom,$prenom,$salaire,$specialite){
        parent::__construct($id,$nom,$prenom,$salaire);
        $this->specialite=$specialite;
    }

    /**
     * Get the value of specialite
     */ 
    public function getSpecialite():string
    {
        return $this->specialite;
    }

    /**
     * Set the value of specialite
     *
     * @return  self
     */ 
    public function setSpecialite(string $specialite):self
    {
        $this->specialite = $specialite;

        return $this;
    }

    // accesseur

    public function __toString(){
        return parent::__toString(). " {specialite}: ".$this->specialite;
    }
}