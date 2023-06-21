<?php
namespace App\Dao;
use App\Models\Task;
use App\Contracts\Dao\UserDaoInterface;
class UserDao implements UserDaoInterface
{
    public function getUser(): array
    {
        return Task::all()->toArray();
    }
    public function createUser(array $data): void
    {
        Task::create([
            'name' => $data['task'],
        ]);
    }
    public function deleteUserById(int $id): void
    {
        Task::where('id', $id)->delete();
    }
}
