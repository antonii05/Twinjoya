<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return Articulo::with(['familia', 'proveedor'])->findOrFail($idArticulo);
    }

    function crear(Request $request)
    {
        $datos= $request->all();
        $datos['id_usuario'] = 1;
        $datos['id_empresa'] = 1;
        //! -------------------Cambiar-------------------
        $datos['compras_unidad_medida'] = 1;
        $datos['ventas_unidad_medida'] = 1;
        //! -------------------Cambiar-------------------
        try {
            DB::beginTransaction();
            Articulo::create($datos);
            DB::commit();
            return response()->json('Articulo Registrado Con Exito', 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json($error->getMessage(), 500);
        }
    }

    function actualizar(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $articuloDB = Articulo::findOrFail($request->id);
            $articuloDB->update($request->except(['familia','proveedor']));
            DB::commit();
            return response()->json('Articulo Modificado Con Exito', 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json($error->getMessage(), 500);
        }
    }

    function eliminar($id)
    {
        try {
            DB::beginTransaction();
            Articulo::findOrFail($id)->delete();
            DB::commit();
            return response()->json('Articulo Eliminado Con Exito', 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json($error->getMessage(), 500);
        }
    }
}
