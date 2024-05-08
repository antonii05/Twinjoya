<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use App\Models\ReparacionesBackup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReparacionesController extends Controller
{
    public function getReparaciones()
    {
        return Reparacion::with(['empresa', 'cliente', 'proveedor', 'taller'])->get();
    }

    public function getReparacion($id)
    {
        return Reparacion::with(['empresa', 'cliente', 'proveedor', 'taller'])->findOrFail($id);
    }

    //-----------------------------------------------ACCIONES CRUD-----------------------------------------------

    /**
     * Function que elimina una reparacion pero la guarda en una tabla de respaldo (dar de Baja) 
     */
    public function eliminar($id)
    {
        $reparacion = Reparacion::findOrFail($id);

        try {
            DB::beginTransaction();
            $reparacionData = $reparacion->toArray();
            unset($reparacionData['id']);
            $reparacionData['numero_reparacion'] = $reparacion->id;
            ReparacionesBackup::create($reparacionData);
            $reparacion->delete();
            DB::commit();
            return response()->json('Reparacion eliminada correctamente', 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json('No se ha podido eliminar la reparcion ERROR: ' . $error->getMessage(), 500);
        }
    }

    /**
     * Funcion que actualiza una reparacion
     */
    public function actualizar(Request $request)
    {
        try {
            DB::beginTransaction();
            //Hacer el save con el if
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json('No se ha podido modificar la reparcion ERROR: ' . $error->getMessage(), 200);
        }
        //return $reparacionActualizada;
    }

    /**
     * Funcion dedicada a crear la Reparacion
     * TODO Hacer que retorne el objeto reparacion
     */
    public function crear(Request $request)
    {
        $datos = $request->all();
        $datos['id_usuario'] = 1;
        $datos['id_empresa'] = $request->empresa['id'];
        $datos['id_cliente'] = $request->cliente['id'];
        $datos['id_taller'] = $request->taller['id'];
        try {
            DB::beginTransaction();
            Reparacion::create($datos);
            DB::commit();
            return response()->json(['Reparacion creada correctamente'], 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json(['No se ha podido crear la reparcion ERROR: ' . $error->getMessage()], 500);
        }
    }
    //-----------------------------------------------ACCIONES CRUD-----------------------------------------------

}
