<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AboutController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/tasks/view', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/about', [AboutController::class, 'about'])->name('tasks.about');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.createtask');
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/tasks/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Eloquent ORM route
Route::get('/getTask', [App\Http\Controllers\TestController::class, 'getTask']);
Route::get('/orderItem', [App\Http\Controllers\TestController::class, 'orderItem']);
