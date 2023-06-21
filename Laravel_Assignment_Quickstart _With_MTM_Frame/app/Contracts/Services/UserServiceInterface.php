<?php
namespace App\Contracts\Services;
interface UserServiceInterface
{
    public function getUser(): array;
    public function createUser(array $data): void;
    public function deleteUserById(int $id): void;
}
