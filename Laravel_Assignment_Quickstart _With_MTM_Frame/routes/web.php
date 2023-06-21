<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [UserController::class, 'index'])->name('tasks.index');
Route::post('/create', [UserController::class, 'create'])->name('tasks.create');
Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('tasks.delete');
