<?php

include_once("Profil.php");
include_once("Personne.php");
include_once("Utilisateur.php");

$profilMN = new Profil(1, "MN", "Manager");
$profilDG = new Profil(2, "DG", "Directeur Général");
$profilCP = new Profil(3, "CP", "Chef de Projet");

$personne1 = new Personne(1, "David", "DUPOND", "d.d@d.com", "061010101010", 1000);
$personne2 = new Personne(2, "Paul", "DUPOND", "d.d@d.com", "061010101010", 10000);
$personne3 = new Personne(3, "Omar", "DUPOND", "d.d@d.com", "061010101010", 100000);

$user1 = new Utilisateur($personne1, "dave", "123456", "Informatique", $profilMN);
// $user1->setLogin("dave")->setPassword("123456")->setService("Infomatique")->setProfil($profilMN);
$user2 = new Utilisateur($personne2, "polo", "123456", "Informatique", $profilDG);
$user3 = new Utilisateur($personne3, "omar", "123456", "Informatique", $profilCP);

var_dump($user1);

echo $user2->calculerSalaire();