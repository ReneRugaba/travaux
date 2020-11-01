<?php
include_once('Ouvr.php');
include_once('Pdg.php');
include_once('Cadresup.php');

$ouvrier = new Ouvr('azerty', 'aa', 'bb', $dateN = new DateTime('26-04-1975'), $embauche = new DateTime('26-04-2000'));
echo "{Ouvrier:} " . $ouvrier . "\n";
$cadre = new CadreSup('azerty', 'aa', 'bb', $dateN = new DateTime('26-04-1975'), 4);
echo "{Cadre:} " . $cadre . "\n";
$Patron = new Pdg('azerty', 'aa', 'bb', $dateN = new DateTime('26-04-1975'), 18901000);
echo "{Patron:} " . $Patron . "\n";
