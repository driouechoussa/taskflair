<?php

namespace App\Repositories;

interface TaskRepositoryInterface
{
    public function findById(int $id): ?array;
    public function getAll(): array;
    public function create(array $data): bool;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
