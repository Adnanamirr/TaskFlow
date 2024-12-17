<?php

use App\Http\Controllers\TaskController;
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

// Show a single task (show)
Route::get('/tasks/{id}',[TaskController::class,'show'])->name('tasks.show');

// Edit an existing task
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Archive (delete) a task
Route::delete('/tasks/{id}',[TaskController::class,'archive'])->name('tasks.archive');

// Restore an archived task
Route::get('/tasks/restore/{id}', [TaskController::class, 'restore'])->name('tasks.restore');
