<?php

include_once("Employe.php");

$employe= new Employe();
$employe->setNumEmploye(1569)->setNom("MARTIN")->setPrenom("Max")->setEmploi("analyste")->setSup(1000)->setEmbauche(13011985)->setSalaire(30000)->setCommission(500)->setNumService(1);

$employe2= new Employe();
$employe2->setNumEmploye(1560)->setNom("MARTiNET")->setPrenom("MAXIMUS")->setEmploi("BOUCHER")->setSup(1200)->setEmbauche(15011970)->setSalaire(30000)->setCommission(500)->setNumService(2);

$employe3= new Employe();
$employe3->setNumEmploye(1560)->setNom("ROBERT")->setPrenom("MARC")->setEmploi("MEDECIN")->setSup(1200)->setEmbauche(15011970)->setSalaire(30000)->setCommission(500)->setNumService(3);

$employe4= new Employe();
$employe4->setNumEmploye(1560)->setNom("PRO")->setPrenom("LIONNEL")->setEmploi("FOOTBALLEUR")->setSup(1200)->setEmbauche(15011970)->setSalaire(30000)->setCommission(500)->setNumService(4);

echo $employe;
var_dump($employe);