<?php

include_once("Service.php");

$Service= new Service();
$Service->setNumService(1)->setNomService("DIRECTION")->setVille("ROUBAIX");



echo $Service;
var_dump($Service);