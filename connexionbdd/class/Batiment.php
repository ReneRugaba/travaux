<?php


class Batiment
{
    private $adresse;
    private $superficie;




    function __construct($newadress)
    {
        $this->adresse = $newadress;
    }


    /**
     * Get the value of adresse
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of superficie
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set the value of superficie
     *
     * @return  self
     */
    public function setSuperficie(int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }


    function __toString()
    {
        return "{adresse} :" . $this->adresse . "{superficie} :" . $this->superficie;
    }
}
