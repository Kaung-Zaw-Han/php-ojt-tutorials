<?php
namespace App\Services;
use App\Contracts\Dao\MajorDaoInterface;
use App\Contracts\Services\MajorServiceInterface;
class MajorService implements MajorServiceInterface
{
    private $majorDao;
    public function __construct(MajorDaoInterface $majorDao)
    {
        $this->majorDao = $majorDao;
    }
    public function majorList(): array
    {
        return $this->majorDao->majorList();
    }
    public function majorCreate(array $data): void
    {
        $this->majorDao->majorCreate($data);
    }
    public function majorEdit(int $id): array
    {
        return $this->majorDao->majorEdit($id);
    }
    public function majorUpdate(array $data, int $id): void
    {
        $this->majorDao->majorUpdate($data, $id);
    }
    public function majorDelete(int $id): void
    {
        $this->majorDao->majorDelete($id);
    }
}
