<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    /**
     * Funcion que retorna todas las familias de la DB
     */
    public function getFamilias (){
        return Familia::all();
    }

    /**
     * Retorna la informacion de una familia en concreto
     */
    public function getFamilia($idFamilia){
        return Familia::findOrFail($idFamilia);
    }
}
