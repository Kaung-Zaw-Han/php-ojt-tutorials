<?php
namespace App\Contracts\Dao;
interface UserDaoInterface
{
    public function getUser(): array;
    public function createUser(array $data): void;
    public function deleteUserById(int $id): void;
}
