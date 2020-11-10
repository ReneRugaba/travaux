<?php

include('Batiment.php');

class Maison extends Batiment{
    private $nbPieces;

    function __construct(string $newAdresse,int $newSuperficie,int $newNbPieces){
        $this->setAdresse($newAdresse);
        $this->setSuperficie($newSuperficie);
        $this->nbPieces=$newNbPieces;
    }


    /**
     * Get the value of nbPieces
     */ 
    public function getNbPieces():int
    {
        return $this->nbPieces;
    }

    /**
     * Set the value of nbPieces
     *
     * @return  self
     */ 
    public function setNbPieces(int $nbPieces): self
    {
        $this->nbPieces = $nbPieces;

        return $this;
    }

    // accesseur class
    function __toString(){
        return "{adesse}: ".$this->getAdresse()."{superficie}: ".$this->getSuperficie(). "{nb de pieces}: ".$this->nbPieces;
    }
}