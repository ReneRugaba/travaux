<?php

/**
 * je gère la deconnexion à partir d'ici
 */
session_start();
session_destroy();
header('location: connexion.php');//après avoir detruit la session je dirige la page vers la page de connexion
