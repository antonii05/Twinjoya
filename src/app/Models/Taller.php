<?php

namespace App\Models;

use App\Models\Base\Taller as BaseTaller;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Taller extends BaseTaller
{
    use HasFactory;

	protected $fillable = [
		'nombre',
		'descripcion',
		'id_empresa',
	];
}
