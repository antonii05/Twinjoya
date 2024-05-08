<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReparacionesBackup extends Model
{
    use HasFactory;

    protected $table='reparaciones_backup';
    protected $fillable = [
        'numero_reparacion',
        'id_empresa',
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
