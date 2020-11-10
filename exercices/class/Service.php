<?php


class Service 
{
    // attributs
        private $numService;
        private $nomService;
        private $ville;
       

    
    // getter/setter
        // set et get de $numService
        public function getNumService():int{
            return $this->numService;
        }

        public function setNumService(int $newnumService):self{
           $this->numService=$newnumService;
           return $this;
        }

        // set et get de $nomService
        public function getNomService():string{
            return $this->nomService;
        }

        public function setNomService(string $newNomService):self{
           $this->nomService=$newNomService;
           return $this;
        }

        // set et get de $ville
        public function getVille(): string{
            return $this->prenom;
        }

        public function setVille(string $newVille):self{
            $this->ville=$newVille;
            return $this;
         }
       


        // fonction retoune class en string
        public function __toString(){
            return "{numero service}".$this->numService."{nom de service}".$this->nomService."{ville}".$this->ville;
        }
}