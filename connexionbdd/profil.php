<?php

/**
 * ici on appel le profil Employe à l'aide de la fonction profiEmp
 */
session_start();
include_once('conditionConsultPages.php');
include_once __DIR__ . '/vues/afficheDetailsEmp.php';
include("service/EmployeService.php");
include_once __DIR__ . '/vues/profilEmp.php';
profiEmp();
