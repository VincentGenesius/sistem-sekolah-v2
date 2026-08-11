<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// TEACHER ROUTES
Route::name('teachers.')->prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');
    Route::get('/create', [TeacherController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');
    Route::get('/', [TeacherController::class, 'store'])->name('store');
    Route::get('/{id}', [TeacherController::class, 'update'])->name('update');
    Route::get('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

// STUDENT ROUTES
Route::name('students.')->prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/{id}', [StudentController::class, 'show'])->name('show');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::get('/', [StudentController::class, 'store'])->name('store');
    Route::get('/{id}', [StudentController::class, 'update'])->name('update');
    Route::get('/{id}', [StudentController::class, 'destroy'])->name('destroy');
}); 
