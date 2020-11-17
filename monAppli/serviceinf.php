<?php

/**
 * ici on appel la session service à l'aide de la fonction serviceInfo()
 */
session_start();
include('conditionConsultPages.php');
include_once("service/ServiceService.php");
include_once __DIR__ . '/vues/afficheDetailsServ.php';
include_once __DIR__ . '/vues/serviceInfo.php';
serviceInfo();
