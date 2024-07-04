<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacturasProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_empresa' => 1,
                //'numero_recepcion' => 1001,
                'fecha_recepcion' => Carbon::now(),
                'id_proveedor' => 1,
                'numero_factura' => 5001,
                //'fecha_factura' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_empresa' => 1,
                //'numero_recepcion' => 1002,
                'fecha_recepcion' => Carbon::now(),
                'id_proveedor' => 2,
                'numero_factura' => 5002,
                //'fecha_factura' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Agrega más registros según sea necesario
        ];

        DB::table('facturas_proveedores')->insert($data);
    }
}
