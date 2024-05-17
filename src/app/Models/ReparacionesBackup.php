<?php

namespace App\Models;

use App\Models\Base\ReparacionesBackup as BaseReparacionesBackup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ReparacionesBackup extends BaseReparacionesBackup
{
    use HasFactory;
	protected $fillable = [
		'numero_reparacion',
		'id_empresa',
		'fecha_recogida',
		'id_cliente',
		'id_taller',
		'fecha_prevista',
		'unidades',
		'importe',
		'descripcion',
		'reparacion_a_realizar',
		'numero_serie',
		'presupuesto_taller',
        'id_usuario',
        'created_at',
        'updated_at',
	];
}
