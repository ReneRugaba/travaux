<?php
include_once __DIR__ . '/../model/Service.php';

interface InterServDao
{
    public function add(Service2 $employe): void;
    public function update(Service2 $employe): void;
    public function delete(int $id): void;
    public function rechercheById(int $id): Service2;
    public function searchAll(): array;
    public function Affect(int $num): ?bool;
}
