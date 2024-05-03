<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReparacionesController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\TallerController;
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

// Rutas para el controlador de Clientes
Route::prefix('v1/clientes')->group(function () {
    Route::resource('recursos', 'ClientesController');
    Route::get('/getClientes', [ClientesController::class, 'getAllClientes']);
    Route::delete('/eliminar/{id}', [ClientesController::class, 'eliminar']);
    Route::put('/actualizar', [ClientesController::class, 'actualizar']);
    Route::post('/crear', [ClientesController::class, 'crear']);
});

//Ruta para la Empresa

Route::prefix('v1/empresas')->group(function () {
    Route::get('/getTalleres/{idEmpresa}', [EmpresaController::class, 'getTalleres']);   //quitar
    Route::get('/getEmpresas', [EmpresaController::class, 'getEmpresas']);   //quitar
});

Route::prefix('/v1/talleres')->group(function () {
    Route::get('/getTalleres', [TallerController::class, 'getTalleres']);
});

Route::prefix('v1/proveedores')->group(function () {
    Route::get('/getProveedores', [ProveedorController::class, 'getProveedores']);
    Route::get('/getProveedor/{id}', [ProveedorController::class, 'detalle']);
    Route::delete('/eliminar/{id}', [ProveedorController::class, 'eliminar']);
    Route::post('/crear', [ProveedorController::class, 'crear']);
    Route::put('/actualizar', [ProveedorController::class, 'actualizar']);
});

Route::prefix('/v1/familias')->group(function () {
    Route::get('/getFamilias', [FamiliaController::class, 'getFamilias']);
    Route::get('/getFamilia/{id}', [FamiliaController::class, 'getFamilia']);
});

Route::prefix('/v1/secciones')->group(function () {
    Route::get('/getSecciones', [SeccionController::class, 'getSecciones']);
    Route::delete('/eliminar/{id}', [SeccionController::class, 'eliminar']);
    Route::post('/crear', [SeccionController::class, 'crear']);
    Route::put('/actualizar', [SeccionController::class, 'actualizar']);
});


Route::prefix('/v1/articulos')->group(function () {
    Route::get('/getArticulos', [ArticulosController::class, 'getArticulos']);
    Route::get('/getArticulo/{idArticulo}', [ArticulosController::class, 'detalle']);
    /* CRUD */
    Route::post('/crear', [ArticulosController::class, 'crear']);
    Route::put('/actualizar', [ArticulosController::class, 'actualizar']);
    Route::delete('/eliminar/{idArticulo}', [ArticulosController::class, 'eliminar']);
});


Route::prefix('/v1/reparaciones')->group(function () {
    Route::get('/getReparaciones', [ReparacionesController::class, 'getReparaciones']);
    Route::get('/getReparacion/{id}', [ReparacionesController::class, 'getReparacion']);
});

