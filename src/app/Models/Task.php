<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'datos_adjuntos',
        'fecha_limite',
        'archivado',
        'id_categoria',
        'id_grupo',
        'id_usuario',
    ];


   /* 
    * Relacion para las tareas
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
