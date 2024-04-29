<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'descripcion',
        'matricula',
        'medida',
        'id_familia',
        'id_proveedor',
        'tipo_compra',
        'barcode',
        'precio_venta',
        'compras_unidad_medida',
        'ventas_unidad_medida',
        'articulo_obsoleto',
        'created_at',
        'updated_at',
    ];

    /**
     * Devuelve la familia que pertencee a ese Articulo
     */
    public function familia()
    {
        return $this->hasOne(Seccion::class, 'id', 'id_familia');
    }

    /**
     * Devuelve el proveedor que pertencee a ese Articulo
     */
    public function proveedor()
    {
        return $this->hasOne(Proveedor::class, 'id', 'id_proveedor');
    }
}
