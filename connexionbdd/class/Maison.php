<?php

include('Batiment');

class Maison extends Batiment{
    private $nbPieces;

    function __construct($newAdresse,$newSuperficie,$newNbPieces){
        $this->adresse=$newAdresse;
        $this->supeficie=$newSuperficie;
        $this->nbPieces=$newNbPieces;
    }


    /**
     * Get the value of nbPieces
     */ 
    public function getNbPieces()
    {
        return $this->nbPieces;
    }

    /**
     * Set the value of nbPieces
     *
     * @return  self
     */ 
    public function setNbPieces($nbPieces)
    {
        $this->nbPieces = $nbPieces;

        return $this;
    }

    // accesseur class
    function __toString(){
        return "{adesse}: ".$this->adresse."{superficie}: ".$this->superficie. "{nb de pieces}: ".$this->nbPieces;
    }
}