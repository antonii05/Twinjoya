<?php

namespace App\Models;

use App\Models\Base\Empresa as BaseEmpresa;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends BaseEmpresa
{
    use HasFactory;

	protected $fillable = [
		'numero_sucursal',
		'razon_social',
		'direccion',
		'pais',
		'descripcion'
	];

    //Relacion para ver los talleres que tiene una empresa
    public function taller(){
        return $this->hasMany(Taller::class, 'id_empresa');
    }
}
