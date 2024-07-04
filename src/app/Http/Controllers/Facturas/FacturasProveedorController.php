<?php

namespace App\Http\Controllers\Facturas;

use App\Http\Controllers\Controller;
use App\Models\FacturasProveedor;
use App\Models\LineasProveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturasProveedorController extends Controller
{

    public function getFacturasProveedor()
    {
        return FacturasProveedor::with(['proveedor', 'empresa'])->get();
    }

    /**
     * Funcion que muestra la factura cuando se le pasa el NUMERO DE FACTURA
     */
    public function getFactura($numeroFactura)
    {
        return FacturasProveedor::with(['proveedor', 'empresa', 'lineas'])->findOrFail($numeroFactura);
    }

    /**
     * Funcion que busca por determinados campos de la tabla de FacturasDelProveedor
     * @param Request $request (campoABuscar, palabra_de_busqueda)
     */
    public function buscar(Request $request)
    {
        $cadena = $request->input('cadena');

        //si no se encuentran facturas tira otro error
        /* if($cadena){
            return response()->json('Ese numero de factrura todavia no se encuentra registrado');
        } */

        // ? si se quiere una busqueda MENOS estricta AÑADIR los '%'
        $facturas =  FacturasProveedor::with(['proveedor', 'empresa'])->where('numero_factura', $cadena)->get();

        if ($facturas->isEmpty()) {
            return response()->json("No se encuentra ninguna factura con ese numero", 500);
        }

        return response()->json($facturas, 200);
    }

    //-----------------------------------------ACCIONES CRUD-----------------------------------------

    //!FALTA CREAR LAS LINEAS Y LOS DEMAS APARTADOS
    public function crear(Request $request)
    {
        $lineas = $request->lineas;

        DB::beginTransaction();
        try {
            $factura = new FacturasProveedor($request->all());
            $factura->id_empresa = $request->empresa['id'];
            $factura->id_proveedor = $request->proveedor['id'];

            //Primero se debe de guardar la factura y despues todas las relaciones
            if (!$factura->save()) return response()->json('No se ha podido guardar la factura', 500);

            //Lamar al controlador de la creacion de lineas
            if ($lineas != null) {
                try {
                    LineasProveedorController::crear($lineas, $factura->numero_factura, $factura->id_empresa,$factura->id_proveedor);
                } catch (\Exception $error) {
                    return response()->json($error->getMessage(), 500);
                }
            }
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json($error->getMessage(), 500);
        }
        return response()->json($factura, 200);
    }

    public function update(Request $request)
    {

        /* $lineas = $request->lineas;

        DB::beginTransaction();
        try {
            $data = LineasProveedorController::update($lineas);
            return $data;
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json($error->getMessage(), 500);
        } */
    }

    /**
     * Funcion que elimina una factura del proveedor al completo
     */
    public function eliminar($id)
    {
        DB::beginTransaction();
        try {
            $factura = FacturasProveedor::findOrFail($id);

            $lineas = LineasProveedor::where('numero_factura', $factura->numero_factura)->get();
            foreach ($lineas as $linea) {
                $linea->delete();
            }

            $factura->delete();
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json('No se ha podido eliminar la factura', 500);
        }
    }
}
