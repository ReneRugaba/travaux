<?php

/**
 * Service interface
 * Employe/service
 */
interface interfService
{
    function modif(int $id): object;
    function sup(int $id): void;
    function edit(object $employe): void;
    public function affect(int $num): ?bool;
    function recherche(): array;
    function Add(object $employe2): void;
    function aff(int $id): object;
}
