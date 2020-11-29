<?php

/**
 * Utimliosateur interface
 */
interface  interfUtilisateur
{
    function setUser(Utilisateur $utilisateur): void;
    function getConnectUser(object $mail): ?object;
}
