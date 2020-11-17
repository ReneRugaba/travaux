<?php
//condistion d'accès au pages de mon appli
//elle est centralisé ici et include dans toutes les pages de celle-ci
if (empty($_SESSION['username'])) {
    header('location: connexion.php');
}
