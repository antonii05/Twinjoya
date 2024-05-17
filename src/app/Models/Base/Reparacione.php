<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reparacione
 * 
 * @property int $id
 * @property int $id_empresa
 * @property Carbon $fecha_recogida
 * @property int|null $id_cliente
 * @property int|null $id_proveedor
 * @property int|null $id_taller
 * @property string|null $telefono
 * @property Carbon|null $fecha_prevista
 * @property int|null $unidades
 * @property float|null $importe
 * @property string $descripcion
 * @property string $reparacion_a_realizar
 * @property string|null $numero_serie
 * @property float|null $presupuesto_taller
 * @property int $id_usuario
 * @property bool $terminada
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Reparacione extends Model
{
	protected $table = 'reparaciones';

	protected $casts = [
		'id_empresa' => 'int',
		'fecha_recogida' => 'datetime',
		'id_cliente' => 'int',
		'id_proveedor' => 'int',
		'id_taller' => 'int',
		'fecha_prevista' => 'datetime',
		'unidades' => 'int',
		'importe' => 'float',
		'presupuesto_taller' => 'float',
		'id_usuario' => 'int',
		'terminada' => 'bool'
	];
}
