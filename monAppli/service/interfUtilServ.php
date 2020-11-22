<?php

/**
 * Utilisateur interface
 */
interface InterfUtilServ
{
    function getConnectU(?object $mail): ?object;
    function setUserServ(?object $utilisateur): void;
}
