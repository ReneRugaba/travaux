<?php


class Employe 
{
    // attributs
        private $numEmploye;
        private $nom;
        private $prenom;
        private $emploi;
        private $sup;
        private $embauche;
        private $salaire;
        private $commission;
        private $numService;

    
    // getter/setter
        // set et get de $numEmploye
        public function getNumEmploye():int{
            return $this->numEmploye;
        }

        public function setNumEmploye(int $newNumEmploye):self{
           $this->numEmploye=$newNumEmploye;
           return $this;
        }

        // set et get de $nom
        public function getNom():string{
            return $this->nom;
        }

        public function setNom(string $newNom):self{
           $this->nom=$newNom;
           return $this;
        }

        // set et get de $prenom
        public function getPrenom(): string{
            return $this->prenom;
        }

        public function setPrenom(string $newPrenom): self{
           $this->prenom=$newPrenom;
           return $this;
        }

        // set et get de $emploi
        public function getEmploi(): string{
            return $this->emploi;
        }

        public function setEmploi(string $newEmploi): self{
           $this->emploi=$newEmploi;
           return $this;
        }

        // set et get de $sup
        public function getSup(): int{
            return $this->prenom;
        }

        public function setSup(int $newSup): self{
           $this->sup=$newSup;
           return $this;
        }

        // set et get de $embauche
        public function getEmbauche(): int{
            return $this->embauche;
        }

        public function setEmbauche(int $newEmbauche): self{
           $this->embauche=$newEmbauche;
           return $this;
        }

        // set et get de $salaire
        public function getSalaire(): int{
            return $this->salaire;
        }

        public function setSalaire(int $newSalaire): self{
           $this->salaire=$newSalaire;
           return $this;
        }

        // set et get de $commision
        public function getCommission(): int{
            return $this->commision;
        }

        public function setCommission(int $newCommission): self{
           $this->commission=$newCommission;
           return $this;
        }

        // set et get de $numService
        public function getNumService(): int{
            return $this->numService;
        }

        public function setNumService(int $newNumService): self{
           $this->numService=$newNumService;
           return $this;
        }


        // fonction retoune class en string
        public function __toString(){
            return "{numero employe}".$this->numEmploye."{nom}".$this->nom."{prenom}".$this->prenom."{emploi}".$this->emploi.
            "{sup}".$this->sup."{salaire}".$this->salaire."{commission}".$this->commission."{numero service}".$this->numService;
        }
}
