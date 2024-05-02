<?php

namespace App\Http\Controllers;

use App\Models\Reparacion;
use Illuminate\Http\Request;

class ReparacionesController extends Controller
{
    public function getReparaciones(){
        return Reparacion::all();
    }

    public function getReparacion($id){
        // TODO TERMINAR 
        //Hacer relaciones con clientes, proveedores, y talleres 
        return Reparacion::with(['empresa','cliente','proveedor','taller'])->findOrFail($id);
    }
}
