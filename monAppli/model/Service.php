<?php

/**
 * cette classe sert à la création des objets $service
 */
class Service2
{
    private $noserv;
    private $service;
    private $ville;

    /**
     * Get the value of noserv
     */
    public function getNoserv(): ?int
    {
        return $this->noserv;
    }

    /**
     * Set the value of noserv
     *
     * @return  self
     */
    public function setNoserv(?int $noserv): self
    {
        $this->noserv = $noserv;

        return $this;
    }

    /**
     * Get the value of service
     */
    public function getService(): ?string
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */
    public function setService(?string $service): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
