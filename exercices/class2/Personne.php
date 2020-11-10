<?php


class Personne{
    protected $id;
    protected $nom;
    protected $prenom;

    public function __construct($id,$nom,$prenom)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
    }

    /**
     * Get the value of id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

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
    public function setNom(string $nom):self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom():string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom(string $prenom):self
    {
        $this->prenom = $prenom;

        return $this;
    }

    // accesseur
    public function __toString()
    {
        return "{id} :" . $this->id . " {nom} :" . $this->nom." {prenom} :" . $this->prenom;
    }
}