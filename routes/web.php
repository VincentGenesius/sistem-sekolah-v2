<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// AUTHENTICATION ROUTES
Route::get('/login', [AuthController::class, 'loginView'])->name('login-view');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// TEACHER ROUTES (ACTION)
Route::name('teachers.')->prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/create', [TeacherController::class, 'create'])->name('create');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');
    Route::post('/', [TeacherController::class, 'store'])->name('store');
    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');
    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

// STUDENT ROUTES (ACTION)
Route::name('students.')->prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::get('/{student}', [StudentController::class, 'show'])->name('show');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::post('/', [StudentController::class, 'store'])->name('store');
    Route::put('/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
}); 

// SCHOOLCLASS ROUTES (INVOKABLE)
Route::name('classes.')->prefix('classes')->group(function () {
    Route::get('/', IndexController::class)->name('index');
    Route::get('/create', CreateController::class)->name('create');
    Route::get('/{id}', ShowController::class)->name('show');
    Route::get('/{id}/edit', EditController::class)->name('edit');
    Route::post('/', StoreController::class)->name('store');
    Route::put('/{id}', UpdateController::class)->name('update');
    Route::delete('/{id}', DestroyController::class)->name('destroy');
}); 

// MAJOR ROUTES (RESOURCE)
Route::resource('majors', MajorController::class);