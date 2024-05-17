<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccione
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $prefijo
 * @property string|null $descripcion
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Seccione extends Model
{
	protected $table = 'secciones';
}
