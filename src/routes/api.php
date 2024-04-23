<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProveedorController;
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
    Route::delete('/eliminar/{id}',[ClientesController::class,'eliminar']);
    Route::put('/actualizar',[ClientesController::class,'actualizar']);
    Route::post('/crear',[ClientesController::class,'crear']);
});

//Ruta para la Empresa

Route::prefix('v1/empresas')->group(function () {
    Route::get('/getTalleres/{idEmpresa}', [EmpresaController::class, 'getTalleres']);
});

Route::prefix('v1/proveedores')->group(function(){
    Route::get('/getProveedores',[ProveedorController::class,'getProveedores']);
    Route::get('/getProveedor/{id}',[ProveedorController::class,'detalle']);
    Route::delete('/eliminar/{id}',[ProveedorController::class,'eliminar']);
    Route::post('/crear',[ProveedorController::class,'crear']);
    Route::put('/actualizar',[ProveedorController::class,'actualizar']);
});
