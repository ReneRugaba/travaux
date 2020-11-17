<?php

/**
 * Utimliosateur interface
 */
interface  interfUtilisateur
{
    function setUser(Utilisateur $utilisateur): void;
    function trouveUser(string $nomcol): array;
    function getConnectUser(object $mail): ?object;
}
