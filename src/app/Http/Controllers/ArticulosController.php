<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    /**
     * Funcion que retorna todos los adrtiuclos de la DB;
     */
    public function getArticulos()
    {
        return Articulo::all();
    }

    /**
     * Funcion que retorna el detalle de un articulo
     */
    function detalle($idArticulo)
    {
        return Articulo::with(['familia','proveedor'])->findOrFail($idArticulo);
    }
}
