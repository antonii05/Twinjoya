<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $id
 * @property string $codigo
 * @property string $nombre_fiscal
 * @property string|null $direccion
 * @property int|null $cod_postal
 * @property string|null $provincia
 * @property string|null $pais
 * @property string|null $telefono1
 * @property string|null $telefono2
 * @property string|null $cif
 * @property string|null $email
 * @property string|null $web
 * @property bool $activo
 * @property int $id_empresa
 * @property int $id_usuario
 * @property Carbon|null $fecha_alta
 * @property Carbon|null $fecha_modificacion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Proveedor extends Model
{
	protected $table = 'proveedors';

	protected $casts = [
		'cod_postal' => 'int',
		'activo' => 'bool',
		'id_empresa' => 'int',
		'id_usuario' => 'int',
		'fecha_alta' => 'datetime',
		'fecha_modificacion' => 'datetime'
	];
}
