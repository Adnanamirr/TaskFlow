<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::post('/create',function (){
    return view('tasks.create');
})->name('tasks.create');

Route::get('/tasks/{task}',[TaskController::class,'show'])->name('tasks.show');
