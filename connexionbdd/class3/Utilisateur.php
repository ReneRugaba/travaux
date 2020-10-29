<?php
include_once('Personne.php');
include_once('Profil.php');


class Utilisateur extends Personne
{
    private $log;
    private $passWord;
    private $service;
    private $profil;

    public function __construct(int $id,string $nom,string $prenom,string $mail,string $telephone,float $salaire, string $log, string $passWord, string $service, Profil $profil)
    {
        parent::__construct($id, $nom, $prenom, $mail, $telephone, $salaire);
        $this->log = $log;
        $this->passWord = $passWord;
        $this->service = $service;
        $this->profil = $profil;
    }

    /**
     * Get the value of log
     */
    public function getLog(): string
    {
        return $this->log;
    }

    /**
     * Set the value of log
     *
     * @return  self
     */
    public function setLog(string $log): self
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get the value of passWord
     */
    public function getPassWord(): string
    {
        return $this->passWord;
    }

    /**
     * Set the value of passWord
     *
     * @return  self
     */
    public function setPassWord(string $passWord): self
    {
        $this->passWord = $passWord;

        return $this;
    }

    /**
     * Get the value of service
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */
    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    // calculSalaire
    public function calculSalaire(): float
    {
        if ($this->profil->getCode() == 'MN') {
            return $this->getSalaire() * 1.10;
        } elseif ($this->profil->getCode() == 'DG') {
            return $this->getSalaire() * 1.40;
        } else {
            return $this->salaire;
        }
    }

    // affiche
    public function affiche(): void
    {
        echo $this;
    }

    /**
     * Get the value of profil
     */
    public function getProfil(): Profil
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */
    public function setProfil(Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }
}
