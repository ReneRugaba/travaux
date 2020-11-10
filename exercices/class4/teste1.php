<?php
include_once('Developpeur.php');
include_once('Manager.php');

$dev = new Developpeur(1, 'martin', 'marcus', 'm@mail.com', '062151321', 13000, 'backend');
echo $dev . "\n";
$dev2 = new Developpeur(2, 'MRS', 'madame', 'f@mail.com', '062551321', 15000, 'backend');
echo $dev2 . "\n";

echo "Le salaire du développeur " . $dev->getNom() . " est: " . $dev->calculSalaire() . " , sa spécialité :" . $dev->getSpecialite() . "\n";
echo "Le salaire du développeur " . $dev2->getNom() . " est: " . $dev2->calculSalaire() . " , sa spécialité :" . $dev2->getSpecialite() . "\n";

$man = new Manager(1, 'martin', 'marcus', 'm@mail.com', '062151321', 13000, 'backend');
echo $dev . "\n";
$man2 = new Manager(2, 'MRS', 'madame', 'f@mail.com', '062551321', 15000, 'backend');
echo $dev2 . "\n";

echo "Le salaire du Manager " . $man->getNom() . " est: " . $man->calculSalaire() . " , sa spécialité :" . $man->getService() . "\n";
echo "Le salaire du Manager " . $man2->getNom() . " est: " . $man2->calculSalaire() . " , sa spécialité :" . $man2->getService();
