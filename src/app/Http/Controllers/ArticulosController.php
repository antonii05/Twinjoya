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
        //Se crea una subconsulta a la relacion par sacar el nombre unicamente
        return Articulo::with(
            ['familia' => function ($query) {
                //Si no se le pasa el id revienta
                $query->select('id', 'nombre');
            }, 'proveedor' => function ($consulta) {
                $consulta->select('id', 'nombre_fiscal');
            }]
        )->get();
    }

    /**
     * Funcion que retorna el detalle de un articulo
     */
    function detalle($idArticulo)
    {
        return Articulo::with(['familia', 'proveedor', 'empresa'])->findOrFail($idArticulo);
    }

    public static function crear(Request $request)
    {
        $datos = $request->all();

        //Se aniade por fuerza el usuario registrado
        $datos['id_usuario'] = 1;

        DB::beginTransaction();
        try {
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
            $articuloDB->update($request->except(['familia', 'proveedor']));
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

    /**
     * Se le pasara el campo a buscar
     */
    public function buscar(Request $request)
    {
        //Request Params
        $encontrarPrimero = filter_var($request->encontrar_primero,FILTER_VALIDATE_BOOLEAN);
        $cadena = $request->cadena;
        $consulta = Articulo::with(['familia', 'proveedor', 'empresa'])->get();




        if ($cadena) {
            if ($encontrarPrimero) {
                $consulta = Articulo::with(['familia', 'proveedor', 'empresa'])
                    ->where('codigo', $cadena)->get()->first();
            } else {
                $consulta = Articulo::with(['familia', 'proveedor', 'empresa'])
                    ->where('codigo', 'LIKE', '%' . $cadena . '%')->get();
            }
            return response()->json($consulta, 200);
        }
        return response()->json('No se ha encontrado ningun articulo con ese codigo ', 500);
    }
}
