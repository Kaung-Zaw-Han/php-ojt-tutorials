<?php
namespace App\Dao;
use App\Models\Major;
use App\Contracts\Dao\MajorDaoInterface;

class MajorDao implements MajorDaoInterface
{
    public function majorList(): array
    {
        return Major::all()->toArray();
    }
    public function majorCreate(array $data): void
    {
        $data = [
            'name' => $data['name']
        ];
        Major::create($data);
    }
    public function majorEdit(int $id): array
    {
        return Major::where('id', $id)->first()->toArray();
    }
    public function majorUpdate(array $data, int $id): void
    {
        $data = [
            'name' => $data['name']
        ];
        Major::where('id', $id)->update($data);
    }
    public function majorDelete(int $id): void
    {
        Major::where('id', $id)->delete();
    }
}
