<?php

namespace App\Models;

use App\Models\Base\LineasProveedor as BaseLineasProveedor;

class LineasProveedor extends BaseLineasProveedor
{
	protected $fillable = [
		'numero_factura',
		'nombre_articulo',
		'ref_proveedor',
		'descripcion',
		'unidades',
		'peso',
		'precio_unitario',
		'total_linea',
		'margen',
		'precio_coste',
		'id_empresa'
	];

	public function articulo(){
		return $this->hasOne(Articulo::class,'id_lineaFacturaProveedor','id');
	}
}
