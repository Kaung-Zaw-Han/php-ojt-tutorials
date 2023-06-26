<?php
namespace App\Contracts\Services;
interface MajorServiceInterface
{
    public function majorList(): array;
    public function majorCreate(array $data): void;
    public function majorEdit(int $id): array;
    public function majorUpdate(array $data, int $id): void;
    public function majorDelete(int $id): void;
}
