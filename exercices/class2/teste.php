<?php
include_once('Etudiant.php');
include_once('Personne.php');
include_once('Employe.php');
include_once('Professeur.php');

$personne= new Personne(1,'Parent','Mere');

echo "personne: " .$personne. "\n";

$etudiant= new Etudiant(2,'Martin','Max','DJF-145');
$etudiant2= new Etudiant(3,'DUBOIS','LOIC','DJF-146');

echo "etidiant: " .$etudiant. "\n";

echo "etidiant2: " .$etudiant2. "\n";

$employe= new Employe(4,'Mart','Maxime',2500.50);
$employe2= new Employe(5,'DUBOIS','LOUIS',3500.10);

echo "employe: " .$employe. "\n";

echo "employe2: " .$employe2. "\n";

$professeur= new Professeur(6,'Mars','Maximus',4500.70,'Math');
$professeur2= new Professeur(7,'Venus','Lucie',7500.90,'Histoire');

echo "prof: " .$professeur. "\n";

echo "prof2: " .$professeur2. "\n";
