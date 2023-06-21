<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contracts\Services\UserServiceInterface;
class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }
    public function index()
    {
        $users = $this->userService->getUser();


        return view('layouts.app', compact('users'));
    }
    public function create(Request $request)
    {
        $this->userService->createUser($request->only([
            'task'
        ]));
        return redirect()->route('tasks.index');
    }
    public function delete($id)
    {
        $this->userService->deleteUserById($id);

        return redirect()->route('tasks.index');
    }
}
