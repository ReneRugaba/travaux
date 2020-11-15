<?php

/**
 * ici on appel la session Utilisateur à l'aide de la fonction profilSession
 */
session_start();
include('conditionConsultPages.php');
include_once __DIR__ . '/vues/profilSession.php';


profiSession();
