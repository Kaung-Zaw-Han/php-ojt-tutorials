<?php

namespace App\Dao;

use App\Contracts\Dao\StudentDaoInterface;
use App\Models\Major;
use App\Models\Student;

class StudentDao implements StudentDaoInterface
{
    public function studentList(): array
    {
        return Student::when(request('searchName'), function ($query) {
            $key = request('searchName');
            $query->where('students.name', 'like', '%' . $key . '%')
                ->orWhere('students.email', 'like', '%' . $key . '%')
                ->orWhere('students.phone', 'like', '%' . $key . '%')
                ->orWhere('students.address', 'like', '%' . $key . '%')
                ->orWhere('majors.name', 'like', '%' . $key . '%');
        })
            ->select('students.*', 'majors.name as majorName')
            ->leftJoin('majors', 'students.major_id', 'majors.id')
            ->get()->toArray();
    }
    public function studentCreatePage(): array
    {
        return Major::all()->toArray();
    }
    public function createStudent(array $data): void
    {
        $data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'major_id' => $data['major'],
            'address' => $data['address'],
        ];
        Student::create($data);
    }
    public function studentEdit($id): array
    {
        return Student::where('id', $id)->first()->toArray();
    }
    public function updateStudent(array $data, int $id): void
    {
        $updateData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' =>  $data['phone'],
            'address' => $data['address'],
            'major_id' =>  $data['major'],
        ];
        Student::where('id', $id)->update($updateData);
    }
    public function deleteStudent(int $id): void
    {
        Student::where('id', $id)->delete();
    }
}
