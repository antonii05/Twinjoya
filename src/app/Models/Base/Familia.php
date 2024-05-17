<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Familia
 * 
 * @property int $id
 * @property string $codigo
 * @property string|null $descripcion_familia
 * @property int $id_seccion
 * @property string|null $unidad_medida
 * @property string|null $texto_etiqueta
 * @property int|null $contador
 * @property float|null $descuento
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Familia extends Model
{
	protected $table = 'familias';

	protected $casts = [
		'id_seccion' => 'int',
		'contador' => 'int',
		'descuento' => 'float'
	];
}
