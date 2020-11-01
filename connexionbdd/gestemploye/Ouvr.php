<?php
include_once('Employe.php');
include_once('DateTofrench.php');

class Ouvr extends Employe
{
    private $embauche;
    public static $smic = 2500;

    /**
     * contructeur
     */
    public function __construct(string $matricule, string $nom, string $prenom, DateTime $dateN, DateTime $embauche)
    {
        parent::__construct($matricule, $nom, $prenom, $dateN);
        $this->embauche = $embauche;
    }

    /**
     * emplementation calculSalaire()
     *  */
    public function calculSalaire(): float
    {
        $date = new DateTime();
        if (self::$smic + $date->diff($this->embauche)->y * 100 < self::$smic * 2) {
            return self::$smic + $date->diff($this->embauche)->y * 100;
        } else {
            return self::$smic * 2;
        }
    }

    /**
     * toString()
     */
    public function __toString()
    {
        $dt = new DateToFrench($this->embauche->format('l d F Y'));
        return parent::__toString() . " {date d'embauche:} " . $dt->forma('l d F Y') . " {salaire:} " . $this->calculSalaire();
    }
}
