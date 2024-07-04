<?php

namespace App\Models;

use App\Models\Base\Articulo as BaseArticulo;

class Articulo extends BaseArticulo
{
	protected $fillable = [
		'codigo',
		'descripcion',
		'matricula',
		'medida',
		'tipo_medida',
		'id_familia',
		'id_proveedor',
		'tipo_compra',
		'barcode',
		'id_marcas',
		'precio_venta',
		'observaciones',
		'articulo_en_uso',
		'id_empresa',
		'id_usuario',
		'id_lineaFacturaProveedor'
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

	/**
	 * Devuelve la empresa a la que pertenece ese articulo
	 * ! No testeado
	 */
	public function empresa()
	{
		return $this->hasOne(Empresa::class, 'id', 'id_empresa');
	}
}
