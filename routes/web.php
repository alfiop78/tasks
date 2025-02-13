<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// visualizzazione dei task
Route::get('/tasks', [TaskController::class, 'index'])->name("tasks.index");

// creare un Task
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// Salvataggio di un task
Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');

// Modifica Task
Route::get('/tasks/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');

// Aggiornamento Task
Route::patch('/tasks/update/{id}', [TaskController::class, 'update'])->name('tasks.update');

// Cancellazione Task
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Task completato
Route::get('/tasks/completed/{id}', [TaskController::class, 'completed'])->name('tasks.completed');

// Task incompletato
Route::get('/tasks/uncompleted/{id}', [TaskController::class, 'uncompleted'])->name('tasks.uncompleted');

