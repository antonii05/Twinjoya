<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class SeccionController extends Controller
{
    /**
     * Function que retorna todas las secciones para editar en secciones
     */
    public function getSecciones()
    {
        return Seccion::all();
    }

    function eliminar($id)
    {
        try {
            DB::beginTransaction();
            Seccion::findOrFail($id)->delete();
            DB::commit();
            return response()->json(['La seccion se ha eliminado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Funcion para crear una seccion por POSTMAN
     */
    function crear(Request $request)
    {
        try {
            DB::beginTransaction();
            Seccion::create($request->all());
            DB::commit();
            return response()->json(['La seccion se ha creado correctamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Fucntion dedicada a la actualizacion de las secciones
     */
    function actualizar(Request $request)
    {
        $jsonData = $request->json()->all(); // Decodificar el JSON a un arreglo
        try {
            DB::beginTransaction();

            foreach ($jsonData as $objeto) {
                if (!isset($objeto['id'])) {
                    Seccion::create($objeto);
                }else{
                    $hasId = Seccion::findOrFail($objeto['id']);
                    $hasId->update($objeto);
                }
            }

            DB::commit();
            return response()->json(['Modificacion Con'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }
}
