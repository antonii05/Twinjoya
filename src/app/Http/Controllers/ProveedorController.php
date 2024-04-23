<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{

    /**
     * Funcion que retorna todos los Proveedores de la DB
     */
    public function getProveedores()
    {
        return Proveedor::all();
    }

    public function detalle($id)
    {
        return response()->json(Proveedor::findOrFail($id), 200);
    }

    /**
     * !preguntar cuando sera posible eliminar a los proveedores
     */
    public function eliminar($id)
    {
        try {
            DB::beginTransaction();
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();
            DB::commit();
            return response()->json('Proveedor eliminado con exito', 200);
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json('Error al eliminar el proveedor Error' . $error, 500);
        }
    }

    /**
     * Funcion para crear un nuevo proveedor
     */
    public function crear(Request $request)
    {
        try {
            DB::beginTransaction();
            $proveedorCreado = Proveedor::create($request->all());
            DB::commit();
            return response()->json(['Proveedor creado con exito', $proveedorCreado], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json('Error al crear el proveedor: Error' . $exception, 500);
        }
    }

    public function actualizar(Request $request)
    {
        $id = $request->id;
        try {
            DB::beginTransaction();
            $proveedor = Proveedor::findOrFail($id);
            $proveedorModificado = $proveedor->update($request->all());
            DB::commit();
            return response()->json(['Proveedor modificado con exito', $proveedorModificado], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json('Error al modificar el proveedor: Error' . $exception, 500);
        }
    }
}
