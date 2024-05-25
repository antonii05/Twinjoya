<?php

namespace App\Models;

use App\Models\Base\FacturasProveedore as BaseFacturasProveedore;

class FacturasProveedor extends BaseFacturasProveedore
{
	protected $fillable = [
		'id_empresa',
		'numero_recepcion',
		'fecha_recepcion',
		'id_proveedor',
		'numero_factura',
		'fecha_factura'
	];
}
