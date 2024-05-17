<?php

namespace App\Models;

use App\Models\Base\Proveedor as BaseProveedor;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends BaseProveedor
{
    use HasFactory;

	protected $fillable = [
		'codigo',
		'nombre_fiscal',
		'direccion',
		'cod_postal',
		'provincia',
		'pais',
		'telefono1',
		'telefono2',
		'cif',
		'email',
		'web',
		'activo',
		'id_empresa',
		'id_usuario',
		'fecha_alta',
		'fecha_modificacion'
	];
}
