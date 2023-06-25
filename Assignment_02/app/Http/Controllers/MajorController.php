<?php
namespace App\Http\Controllers;
use App\Contracts\Services\MajorServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MajorController extends Controller
{
    private $majorService;
    public function __construct(MajorServiceInterface $majorServiceInterface)
    {
        $this->majorService = $majorServiceInterface;
    }
    public function index()
    {
        $majors = $this->majorService->majorList();
        return view('majors.index', compact('majors'));
    }

    public function createPage()
    {
        return view('majors.create');
    }

    public function create(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:majors,name'
        ])->validate();

        $this->majorService->majorCreate($request->only([
            'name',
        ]));
        return redirect()->route('major.index');
    }
    public function delete($id)
    {
        $this->majorService->majorDelete($id);
        return redirect()->route('major.index');
    }
    public function editPage($id)
    {
        $majors = $this->majorService->majorEdit($id);
        return view('majors.edit', compact('majors'));
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:majors,name,' . $id
        ])->validate();

        $this->majorService->majorUpdate($request->only([
            'name',
        ]), $id);
        return redirect()->route('major.index');
    }
}
