<?php
namespace App\Services;
use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;
class UserService implements UserServiceInterface
{
    private $userDao;
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }
    public function getUser(): array
    {
        return $this->userDao->getUser();
    }
    public function createUser(array $data): void
    {
        $this->userDao->createUser($data);
    }
    public function deleteUserById(int $id): void
    {
        $this->userDao->deleteUserById($id);
    }
}
