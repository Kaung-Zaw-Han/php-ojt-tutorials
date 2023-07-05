<?php
namespace App\Services;
use App\Contracts\Dao\StudentDaoInterface;
use App\Contracts\Services\StudentServiceInterface;
class StudentService implements StudentServiceInterface
{
    private $studentDao;
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }
    public function studentList(): array
    {
        return $this->studentDao->studentList();
    }
    public function studentCreatePage(): array
    {
        return $this->studentDao->studentCreatePage();
    }
    public function createStudent(array $data): void
    {
        $this->studentDao->createStudent($data);
    }
    public function studentEdit(int $id): array
    {
        return $this->studentDao->studentEdit($id);
    }

    public function updateStudent(array $data, int $id): void
    {
        $this->studentDao->updateStudent($data, $id);
    }
    public function deleteStudent(int $id): void
    {
        $this->studentDao->deleteStudent($id);
    }
}
