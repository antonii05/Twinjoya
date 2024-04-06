<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }

    // * ------------------------------ Metodos generados por @autor: Antonio ------------------------------

    public function tareasUser(){
        //! Cuando se cree el login hacer que se busque por el id que tiene el usuario logeado
        $user = User::find(2);
        $tasks = $user->tasks;
        return response()->json($tasks);
    }
}
