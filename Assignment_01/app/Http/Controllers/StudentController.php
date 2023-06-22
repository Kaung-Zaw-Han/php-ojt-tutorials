<?php
namespace App\Http\Controllers;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\StudentServiceInterface;
class StudentController extends Controller
{
    private $studentService;
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentService = $studentServiceInterface;
    }
    public function index()
    {
        $students = $this->studentService->studentList();
        return view('students.index', compact('students'));
    }
    public function createPage()
    {
        $majors = $this->studentService->studentCreatePage();
        return view('students.create', compact('majors'));
    }
    public function create(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|max:11',
            'address' => 'required',
            'email' => 'required|unique:students,email',
            'major' => 'required',
        ])->validate();
        $this->studentService->createStudent($request->only([
            'name',
            'email',
            'phone',
            'address',
            'major',
        ]));
        return redirect()->route('student.index');
    }
    public function delete($id)
    {
        $this->studentService->deleteStudent($id);

        return redirect()->route('student.index');
    }
    public function editPage($id)
    {
        $students = $this->studentService->studentEdit($id);
        $majors = Major::all()->toArray();
        return view('students.edit', compact('students', 'majors'));
    }
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|max:11',
            'address' => 'required',
            'email' => 'required|unique:students,email,' . $id,

        ])->validate();
        $this->studentService->updateStudent($request->only([
            'name',
            'email',
            'phone',
            'address',
            'major',
        ]), $id);
        return redirect()->route('student.index');
    }
}
