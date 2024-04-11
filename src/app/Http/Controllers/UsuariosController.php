<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios);
    }

    /**
     * Metodo para Guarar un usuario nuevo 
     * * Este metodo es capaz q no sea necesario ya que mas tarde se generar los usuarios con la autentificacion de usuario de Laravel y Vue 
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param Request $request
     */
    public function show(Request $request)
    {
        $usuario = User::find($request->id);
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request y para obtener el id lo haremos con el id del request que traemos
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $usuario = User::find($request->id);
            $usuario->update($request->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["Mensaje de Error", 500]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request 
     */
    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            $usuario = User::find($request->id);
            $usuario->delete();
            DB::commit();
            return response()->json(["mensaje para saber que todo ha salido correctamente", 200]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["Msg de Error", 500]);
        }
    }
}
