<?php

use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/index');

Route::get('index', function () {
    return view('index');
})->name('Index');

Route::resource('tareas', TareasController::class);
//CREAR NUEVA TAREA
Route::post('/tareas/create', [TareasController::class, 'store'])->name('tareas-create');
//TODAS LAS TAREAS
Route::get('/index', [TareasController::class, 'index'])->name('TareasIndex');
//TAREA INDIVIDUAL
Route::get('/index/{id}', [TareasController::class, 'show'])->name('Tareas-Show');
//ACTUALIZAR TAREAS
Route::patch('/index/{id}', [TareasController::class, 'update'])->name('Tareas-update');
//BORRAR TAREAS
Route::delete('/index/{id}', [TareasController::class, 'destroy'])->name('Tareas-destroy');

Route::post('/index', [SubTaskController::class, 'store'])->name('CrearSubtarea');

Route::delete('/index/{id}/{taskId}', [SubTaskController::class, 'destroy'])->name('BorrarSubtarea');

Route::post('/index/{id}/subtareas', [SubTaskController::class, 'store'])->name('Tareas-Subtareas');

//Vista para los LOGS
Route::get('/activity-log', 'App\Http\Controllers\ActivityLogController@index')->name('activity-log.index');


