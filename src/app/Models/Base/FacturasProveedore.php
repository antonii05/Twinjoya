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
 * @property int $numero_factura
 * @property Carbon $fecha_recepcion
 * @property int $id_proveedor
 * @property int $id_empresa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class FacturasProveedore extends Model
{
	protected $table = 'facturas_proveedores';
	protected $primaryKey = 'numero_factura';

	protected $casts = [
		'fecha_recepcion' => 'datetime',
		'id_proveedor' => 'int',
		'id_empresa' => 'int'
	];
}
