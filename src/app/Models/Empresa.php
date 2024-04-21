<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_sucursal',
        'razon_social',
        'direccion',
        'pais',
        'descripcion',
    ];

    //Relacion para ver los talleres que tiene una empresa
    public function taller(){
        return $this->hasMany(Taller::class, 'id_empresa');
    }
}
