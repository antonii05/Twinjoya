<?php

use App\Http\Controllers\Api\V1\UsuariosController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//* Generar las rutas correspondientes

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para el controlador de usuarios
Route::prefix('v1/usuarios')->group(function () {
    Route::resource('recursos','Api\V1\UsuariosController');
});

// Rutas para el controlador de tareas
Route::prefix('v1/tareas')->group(function () {
    Route::resource('recursos','Api\V1\TaskController');
    Route::get('listarTareas',[TaskController::class,'tareasUser']);
    Route::get('tarea/{id}',[TaskController::class,'detalle']);
});