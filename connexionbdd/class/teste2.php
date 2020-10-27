<?php

include('Batiment.php');



$batiment = new Batiment('rue de la virgule');
$batiment->setsuperficie(70);

echo $batiment;
