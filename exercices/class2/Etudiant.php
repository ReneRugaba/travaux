<?php

include_once('Personne.php');

class Etudiant extends Personne{
    private $cne;

    public function __construct(int $newId,string $newNom,string $newPrenom, string $newCne){
        parent::__construct($newId,$newNom,$newPrenom);
        $this->cne=$newCne;
    }

    /**
     * Get the value of cne
     */ 
    public function getCne():string
    {
        return $this->cne;
    }

    /**
     * Set the value of cne
     *
     * @return  self
     */ 
    public function setCne(string $cne):self
    {
        $this->cne = $cne;

        return $this;
    }

    public function __toString(){
        return "personne: ". parent:: __toString()." {CNE} :".$this->cne;
    }
}