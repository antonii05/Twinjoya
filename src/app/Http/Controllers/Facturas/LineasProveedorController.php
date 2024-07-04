<?php

namespace App\Http\Controllers\Facturas;

use App\Http\Controllers\Controller;
use App\Models\LineasProveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LineasProveedorController extends Controller
{

    /**
     * DESCRIPCION
     * Funciones que se le pasara un array con las lineas y sus determinados articulos
     */

     //!terminar de crear los articulos
    public static function crear(array $lineas,int $numeroFactura,int $id_empresa,int $id_proveedor)
    {
        DB::beginTransaction();
        try {
            foreach ($lineas as $linea) {
                $linea['numero_factura'] = $numeroFactura;
                $linea['id_empresa'] = $id_empresa;
                LineasProveedor::create($linea);

                // * SE CREAN LOS ARTICULOS
                $articulo = $linea['articulo'];
                $articulo->id_proveedor = $id_proveedor;
                
            }
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            //Se lanza el error al controlador padre
            throw $error;
        }
    }

    //!terminar O MAS BIEN EMPEZAR
    public static function update(array $lineas)
    {
        DB::beginTransaction();
        try {
            foreach ($lineas as $linea) {
                $lineaCreada = LineasProveedor::findOrFail($linea['id']);
                $lineaCreada->update($linea);
                $articulo = $linea['articulo'];
            }
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            //Se lanza el error al controlador padre
            throw $error;
        }
    }

    //-------------------------------------METODOS PRIVADOS-------------------------------------

    private function crearArticulo(array $articulo) {
        
    }

    private function updateArticulo(array $articulo) {
        
    }
}
