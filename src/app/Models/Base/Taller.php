<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Taller
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $id_empresa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Taller extends Model
{
	protected $table = 'tallers';
}
