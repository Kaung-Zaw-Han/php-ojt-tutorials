<?php
namespace App\Contracts\Services;
interface StudentServiceInterface
{
    public function studentList(): array;
    public function studentCreatePage(): array;

    public function createStudent(array $data): void;

    public function studentEdit(int $id): array;
    public function updateStudent(array $data, int $id): void;
    public function deleteStudent(int $id): void;
}
