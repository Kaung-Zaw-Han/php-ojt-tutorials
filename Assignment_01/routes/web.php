<?php
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('student')->group(function () {
    Route::get('/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('/createPage', [StudentController::class, 'createPage'])->name('student.createPage');
    Route::post('/create', [StudentController::class, 'create'])->name('student.create');
    Route::delete('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
    Route::get('/editPage/{id}', [StudentController::class, 'editPage'])->name('student.editPage');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
});
Route::prefix('major')->group(function () {
    Route::get('/index', [MajorController::class, 'index'])->name('major.index');
    Route::get('/createPage', [MajorController::class, 'createPage'])->name('major.createPage');
    Route::post('/create', [MajorController::class, 'create'])->name('major.create');
    Route::delete('/delete/{id}', [MajorController::class, 'delete'])->name('major.delete');
    Route::get('/editPage/{id}', [MajorController::class, 'editPage'])->name('major.editPage');
    Route::post('/update/{id}', [MajorController::class, 'update'])->name('major.update');
});
