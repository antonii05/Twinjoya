<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FacturasProveedore
 * 
 * @property int $id
 * @property int $id_empresa
 * @property int $numero_recepcion
 * @property Carbon $fecha_recepcion
 * @property int $id_proveedor
 * @property int $numero_factura
 * @property Carbon $fecha_factura
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class FacturasProveedore extends Model
{
	protected $table = 'facturas_proveedores';

	protected $casts = [
		'id_empresa' => 'int',
		'numero_recepcion' => 'int',
		'fecha_recepcion' => 'datetime',
		'id_proveedor' => 'int',
		'numero_factura' => 'int',
		'fecha_factura' => 'datetime'
	];
}
