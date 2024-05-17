<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property string|null $telefono
 * @property string|null $telefono_fijo
 * @property string $username
 * @property string $password
 * @property string|null $rol
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class User extends Model
{
	//protected $table = 'users';
}
