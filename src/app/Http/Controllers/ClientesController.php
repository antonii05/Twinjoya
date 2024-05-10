<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientesController extends Controller
{


    /**
     * Funcion que retorna todos los clientes de la DB
     */
    public function getAllClientes()
    {
        try {
            $clientes = Cliente::all();
            return $clientes;
        } catch (\Exception $e) {
            return response()->json(['Error en la carga de los clientes Error: ' . $e], 500);
        }
    }

    /**
     * Detalle Cliente
     */
    public function show(string $id)
    {
        try {
            return Cliente::with(['reparaciones'])->findOrFail($id);
        } catch (\Exception $e) {
            return response()->json('Error: ' . $e, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    //! verificar que el usuario no tenga ninguna compra ni reparacion 
    public function eliminar($id)
    {
        try {
            DB::beginTransaction();
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            DB::commit();
            return response()->json(['Eliminacion Correcta'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['Eliminacion Fallida ERROR BACKEND: ' . $e], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     */
    public function actualizar(Request $request)
    {
        try {
            DB::beginTransaction();
            $cliente = Cliente::findOrFail($request->id);
            $cliente->update($request->all());
            DB::commit();
            return response()->json('Cliente modificado con exito', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Modificacion del cliente fallida ERROR: ' . $e, 500);
        }
    }

    /**
     * Funcion prara la creacion de un nuevo Cliente
     */

    public function crear(Request $request)
    {
        $today = Carbon::now(); // Obtiene la fecha y hora actual en la zona horaria predeterminada
        $date = $today->toDateTimeString(); // Obtiene solo la parte de la fecha en formato 'YYYY-MM-DD'
        $request->merge(['fecha_alta' => $date]);
        try {
            DB::beginTransaction();
            Cliente::create($request->all());
            DB::commit();
            return response()->json('Cliente dado de alta correctamente', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json('Alta de cliente fallida ERROR BACKEND' . $e->getMessage(), 500);
        }
    }

    //---------------------------------------FUNCIONES PRIVADAS---------------------------------------

    /**
     * Funcion que comprueba que los valores traidos del Front sean correctos (sino los cambiara)
     */
    private function comprobarValoresOK(Request $request)
    {
    }
}
