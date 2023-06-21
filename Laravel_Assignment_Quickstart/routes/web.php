<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/create', [TaskController::class, 'create'])->name('tasks.create');
Route::delete('/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
