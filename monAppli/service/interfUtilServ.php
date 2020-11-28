<?php

/**
 * Utilisateur interface
 */
interface InterfUtilServ
{
    function getConnectU(?object $object): ?object;
    function setUserServ(?object $utilisateur): void;
}
