<?php

namespace App\Models;

use App\Models\Base\Reparacione as BaseReparacione;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reparacion extends BaseReparacione
{
    use HasFactory;

	protected $fillable = [
		'id_empresa',
		'fecha_recogida',
		'id_cliente',
		'id_proveedor',
		'id_taller',
		'telefono',
		'fecha_prevista',
		'unidades',
		'importe',
		'descripcion',
		'reparacion_a_realizar',
		'numero_serie',
		'presupuesto_taller',
		'id_usuario',
        'terminada',
        'created_at',
        'updated_at',
	];

	public function empresa(){
        return $this->hasOne(Empresa::class,'id','id_empresa');
    }

    public function cliente(){
        return $this->hasOne(Cliente::class,'id','id_cliente');
    }

    public function proveedor() {
        return $this->hasOne(Proveedor::class,'id','id_proveedor');
    }

    public function taller() {
        return $this->hasOne(Taller::class,'id','id_taller');
    }
}
