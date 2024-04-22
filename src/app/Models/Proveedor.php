<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_fiscal',
        'direccion',
        'cod_postal',
        'provincia',
        'pais',
        'telefono1',
        'telefono2',
        'cif',
        'email',
        'activo',
        'id_empresa',
        'id_usuario',
        'fecha_alta',
        'fecha_modificacion',
    ];
}
