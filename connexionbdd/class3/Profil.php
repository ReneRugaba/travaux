<?php


class Profil
{
    private $id;
    private $code;
    private $libelle;


    public function __construct(int $id, string $code, string $libelle)
    {
        $this->id = $id;
        $this->code = $code;
        $this->libelle = $libelle;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }



    /**
     * Get the value of code
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of libelle
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function __toString()
    {
        return $this->libelle;
    }
}
