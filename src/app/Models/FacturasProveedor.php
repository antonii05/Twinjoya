<?php

namespace App\Models;

use App\Models\Base\FacturasProveedore as BaseFacturasProveedore;

class FacturasProveedor extends BaseFacturasProveedore
{
	protected $fillable = [
		'id_empresa',
		//'numero_recepcion',
		'fecha_recepcion',
		'id_proveedor',
		'numero_factura',
		'fecha_factura'
	];

	public function proveedor()
	{
		return $this->hasOne(Proveedor::class,'id','id_proveedor');
	}

	public function empresa() {
		return $this-> hasOne(Empresa::class,'id','id_empresa');
	}

	public function lineas() {
		return $this->hasMany(LineasProveedor::class,'numero_factura','numero_factura')->with('articulo');
	}
}
