<?php
include_once __DIR__ . '/Objet.php';


class Utilisateur extends Objet
{

    private $email;
    private $passWord;
    private $profil;

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of passWord
     */
    public function getPassWord(): ?string
    {
        return $this->passWord;
    }

    /**
     * Set the value of passWord
     *
     * @return  self
     */
    public function setPassWord(?string $passWord): self
    {
        $this->passWord = $passWord;

        return $this;
    }

    /**
     * Get the value of profil
     */
    public function getProfil(): ?string
    {
        return $this->profil;
    }

    /**
     * Set the value of profil
     *
     * @return  self
     */
    public function setProfil(?string $profil): self
    {
        $this->profil = $profil;

        return $this;
    }
}
