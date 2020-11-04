<?php
if (empty($_SESSION['username'])) {
    header('location: connexion.php');
}
