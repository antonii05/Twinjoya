<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LineasProveedor
 * 
 * @property int $id
 * @property int $numero_factura
 * @property string $nombre_articulo
 * @property string $ref_proveedor
 * @property string $descripcion
 * @property int $unidades
 * @property float $peso
 * @property float $precio_unitario
 * @property float $total_linea
 * @property float $margen
 * @property float $precio_coste
 * @property int $id_empresa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class LineasProveedor extends Model
{
	protected $table = 'lineas_proveedor';

	protected $casts = [
		'numero_factura' => 'int',
		'unidades' => 'int',
		'peso' => 'float',
		'precio_unitario' => 'float',
		'total_linea' => 'float',
		'margen' => 'float',
		'precio_coste' => 'float',
		'id_empresa' => 'int'
	];
}
