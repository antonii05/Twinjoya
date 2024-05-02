<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    protected $table = 'reparaciones';

    protected $fillable = [
        'numero_reparacion',
        'id_empresa',
        'fecha_recogida',
        'id_cliente',
        'id_proveedor',
        'id_taller',
        'fecha_prevista',
        'unidades',
        'importe',
        'descripcion',
        'numero_serie',
        'presupuesto_taller',
        'id_usuario',
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
