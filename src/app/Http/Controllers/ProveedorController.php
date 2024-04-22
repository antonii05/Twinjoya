<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    /**
     * Funcion que retorna todos los Proveedores de la DB
     */
    public function getProveedores(){
        return Proveedor::all();
    }
}
