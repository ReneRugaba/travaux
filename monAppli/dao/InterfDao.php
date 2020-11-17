<?php

/**
 * DAO interface
 * Employe/Service
 */
interface InterfDao
{
    public function delete(int $id): void;
    public function searchAll(): array;
    public function Affect(int $num): ?bool;
    public function add(object $service): void;
    public function update(object $service): void;
    public function rechercheById(int $id): object;
}
