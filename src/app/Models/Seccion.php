<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    //aqui indicamos en nuevo nombre de la tabla al que hace referencia
    protected $table = 'secciones';
    protected $fillable = [
        'nombre',
        'prefijo',
        'descripcion',
    ];
}
