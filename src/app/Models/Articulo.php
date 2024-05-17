<?php

namespace App\Models;

use App\Models\Base\Articulo as BaseArticulo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Articulo extends BaseArticulo
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
		'articulo_en_uso',
		'id_empresa',
		'id_usuario',
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
