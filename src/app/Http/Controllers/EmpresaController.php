<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Models\Taller;  

class EmpresaController extends Controller
{
    /**
     * Funcion que retorna todas las Empresas
     */
    public function getEmpresas(){
        return Empresa::all();
    }

    /**
     * Funcion que retorna los talleres de una empresa
     * @return Taller[]
     */
    public function getTalleres($id){
        $empresa = Empresa::findOrFail($id);
        return $empresa->taller;
    }
}
