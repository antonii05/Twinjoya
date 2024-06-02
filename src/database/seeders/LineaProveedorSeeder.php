<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineaProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lineas_proveedor')->insert([
            [
                'nombre_articulo' => 'Articulo 1',
                'numero_factura' => 5001,
                'ref_proveedor' => 'REF123',
                'descripcion' => 'Descripción del artículo 1',
                'unidades' => 10,
                'peso' => 1.5,
                'precio_unitario' => 50.00,
                'total_linea' => 500.00,
                'margen' => 20.00,
                'precio_coste' => 30.00,
                'id_empresa' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre_articulo' => 'Articulo 2',
                'numero_factura' => 5001,
                'ref_proveedor' => 'REF456',
                'descripcion' => 'Descripción del artículo 2',
                'unidades' => 5,
                'peso' => 2.0,
                'precio_unitario' => 100.00,
                'total_linea' => 500.00,
                'margen' => 25.00,
                'precio_coste' => 75.00,
                'id_empresa' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records as needed
        ]);
    }
}
