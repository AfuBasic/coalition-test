<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'handleTaskWithoutProject'])->name('tasks.index');
Route::resource('projects', ProjectController::class)->except(['show']);
Route::resource('project.tasks', TaskController::class)->shallow();