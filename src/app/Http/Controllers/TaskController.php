<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Trae todas las tareas que tenga ese usuario, sin hacer encapie en la categoria ni en el grupo en el que se encuentra
     */
    public function index()
    {
        return response()->json("INDEX OF TAREAS");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // * Eliminar la varibale para perder tiempo de ejecucion
            $task = Task::create($request->all());
            DB::commit();
            return response()->json(['Tarea guaradad con exito'], 200);
        } catch (\Exception $err) {
            DB::rollBack();
            return response()->json(['BACKEND -> Error al eliminar la tarea ERROR: ' . $err], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            DB::beginTransaction();
            $task->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['BACKEND -> Error al eliminar la tarea ERROR: ' . $e], 500);
        }
    }

    // * ------------------------------ Metodos generados por @autor: Antonio ------------------------------

    public function tareasUser()
    {
        //! Cuando se cree el login hacer que se busque por el id que tiene el usuario logeado
        $user = User::find(2);
        $tasks = $user->tasks;
        return response()->json($tasks);
    }
}
