<?php
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all()->toArray();
        return view('layouts.app', compact('tasks'));
    }
    public function create(Request $request)
    {
        $data = [
            'name' => $request->task
        ];
        Task::create($data);
        return redirect()->route('tasks.index');
    }
    public function delete($id)
    {
        Task::where('id', $id)->delete();
        return redirect()->route('tasks.index');
    }
}
