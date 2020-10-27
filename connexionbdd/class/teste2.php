<?php

include('Batiment.php');
include('Maison.php');


$batiment= new Batiment('rue de la virgule');
$batiment->setAdresse('rue de virgule')->setsuperficie(70);

echo $batiment;