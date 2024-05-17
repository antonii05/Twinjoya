<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property int $id
 * @property int $numero_sucursal
 * @property string $razon_social
 * @property string $direccion
 * @property string $pais
 * @property string|null $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Empresa extends Model
{
	protected $table = 'empresas';

	protected $casts = [
		'numero_sucursal' => 'int'
	];
}
