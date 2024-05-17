<?php

namespace App\Models;

use App\Models\Base\Seccione as BaseSeccione;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seccion extends BaseSeccione
{
    use HasFactory;

	protected $fillable = [
		'nombre',
		'prefijo',
		'descripcion'
	];
}
