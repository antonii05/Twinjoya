<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'hola mundo';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            return response()->json($cliente, 200);
        } catch (\Exception $e) {
            return response()->json('Error: '.$e,500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Funcion que retorna todos los clientes de la DB
     */
    public function getAllClientes()
    {
        try {
            $clientes = Cliente::all();
            return $clientes;
        } catch (\Exception $e) {
            return response()->json(['Error en la carga de los clientes Error: ' . $e], 500);
        }
    }
}
