<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'direccion',
        'cod_postal',
        'provincia',
        'pais',
        'telefono',
        'telefonoFijo',
        'nif',
        'grupo_familiar',
        'activo',
        'tipo_cliente',
        'fecha_alta',
        'id_usuario',
        'id_empresa',
    ];

    public static function generarNifAleatorio()
    {
        $numero = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        
        $letra = 'TRWAGMYFPDXBNJZSQVHLCKE'[intval($numero) % 23];
        
        return $numero . $letra;
    }
}
