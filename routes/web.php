<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

// Task routes
Route::group(['prefix' => 'tasks'], function () {
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/{taskId}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/{taskId}', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('/{taskId}/confirm-delete', [TaskController::class, 'confirmDelete'])->name('tasks.confirm');
    Route::delete('/{taskId}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::post('/update-priority', [TaskController::class, 'updatePriority'])->name('tasks.update-priority');
});

// Project routes
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/create', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/{projectId}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/{projectId}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/{projectId}/confirm-delete', [ProjectController::class, 'confirmDelete'])->name('projects.confirm');
    Route::delete('/{projectId}/delete', [ProjectController::class, 'destroy'])->name('projects.destroy');
});