<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');


Route::get('/tasks/{task}',[TaskController::class,'show'])->name('tasks.show');

Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');


