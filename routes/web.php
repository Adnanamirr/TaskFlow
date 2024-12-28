<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('home');
});

// Show all tasks (index)
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// Show archived tasks
Route::get('/tasks/archived', [TaskController::class, 'archived'])->name('tasks.archived');

// Create a new task
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Show single task
Route::get('/tasks/{id}',[TaskController::class,'show'])->name('tasks.show');

// Edit task
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Archive (delete) a task
Route::delete('/tasks/{id}',[TaskController::class,'archive'])->name('tasks.archive');

// Force-Delete a task
Route::delete('/tasks/force-delete/{id}', [TaskController::class, 'forceDelete'])->name('tasks.forceDelete');

// Restore an archived task
Route::get('/tasks/restore/{id}', [TaskController::class, 'restore'])->name('tasks.restore');

////////////////////////////////////////////////////
// Show login form
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');

// Handle login submission
Route::post('/user/login', [UserController::class, 'authenticate'])->name('user.login.submit');


// Show all Users
Route::get('/users/index', [UserController::class,'index'])->name('user.index');

//Archived User list
Route::get('/user/archived', [UserController::class, 'archived'])->name('user.archived');

// sign-up new user
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');

//show single user
Route::get('/user/{id}',[UserController::class,'show'])->name('user.show');

// edit user details
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

//Archive User
Route::delete('/user/{id}',[UserController::class,'archive'])->name('user.archive');

// Force-Delete User
Route::delete('/user/force-delete/{id}', [UserController::class, 'forceDelete'])->name('user.forceDelete');

// Restore an archived User
Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');


