<?php
include_once __DIR__ . '/../model/Employe.php';

interface InterEmpfDao
{
    public function add(Employe2 $employe): void;
    public function update(Employe2 $employe): void;
    public function delete(int $id): void;
    public function rechercheById(int $id): Employe2;
    public function searchAll(): array;
    public function Affect(int $num): ?bool;
}
