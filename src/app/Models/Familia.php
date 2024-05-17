<?php

namespace App\Models;

use App\Models\Base\Familia as BaseFamilia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Familia extends BaseFamilia
{
    use HasFactory;

	protected $fillable = [
		'codigo',
		'descripcion_familia',
		'id_seccion',
		'unidad_medida',
		'texto_etiqueta',
		'contador',
        'descuento',
        'imprimir_ventas',
        'compras_unidad_medida',
        'compras_has_metal',
        'compras_subcuenta_asociada',
        'ventas_unidad_medida',
        'ventas_subcuenta_asociada',
        'created_at',
        'updated_at',
	];
}
