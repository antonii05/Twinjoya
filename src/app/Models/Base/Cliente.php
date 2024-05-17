<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $apellidos
 * @property string|null $email
 * @property string|null $direccion
 * @property int|null $cod_postal
 * @property string|null $provincia
 * @property string|null $pais
 * @property string|null $telefono
 * @property string|null $telefonoFijo
 * @property string|null $nif
 * @property string|null $grupo_familiar
 * @property bool $activo
 * @property int|null $tipo_cliente
 * @property Carbon|null $fecha_alta
 * @property int $id_usuario
 * @property int $id_empresa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Cliente extends Model
{
	protected $table = 'clientes';

	protected $casts = [
		'cod_postal' => 'int',
		'activo' => 'bool',
		'tipo_cliente' => 'int',
		'fecha_alta' => 'datetime',
		'id_usuario' => 'int',
		'id_empresa' => 'int'
	];
}
