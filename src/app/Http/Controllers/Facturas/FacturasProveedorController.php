<?php

namespace App\Http\Controllers\Facturas;

use App\Http\Controllers\Controller;
use App\Models\FacturasProveedor;
use Illuminate\Http\Request;

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
        return FacturasProveedor::with(['proveedor', 'empresa'])->findOrFail($numeroFactura);
    }

    /**
     * Funcion que busca por determinados campos de la tabla de FacturasDelProveedor
     * @param Request $request (campo, palabra_de_busqueda)
     */
    public function buscar(Request $request)
    {
        $cadena = $request->input('cadena');

        //si no se encuentran facturas tira otro error
        /* if($cadena){
            return response()->json('Ese numero de factrura todavia no se encuentra registrado');
        } */
        // ? si se quiere una busqueda estricta quitar los '%'
        $facturas =  FacturasProveedor::with(['proveedor', 'empresa'])->where('numero_factura', $cadena )->get();

        if ($facturas->isEmpty()) {
            return response()->json("No se encuentra ninguna factura con ese numero", 500);
        }

        return response()->json($facturas, 200);
    }
}
