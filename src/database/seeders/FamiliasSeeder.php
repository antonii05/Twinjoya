<?php

namespace Database\Seeders;

use App\Models\Familia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class FamiliasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Familia::create([
            'codigo' => Str::random(6),
            'descripcion_familia' => "Descripcion",
            'id_seccion' => 1,
            'unidad_medida' => Str::random(10),
            'texto_etiqueta' => 'JOY',
            'contador' => rand(1, 100),
            'descuento' => rand(0, 100) / 10,
            //'imprimir_ventas' => rand(0, 1),
            /* 'compras_unidad_medida' => rand(0, 1),
            'compras_has_metal' => rand(0, 1),
            'compras_subcuenta_asociada' => Str::random(10),
            'ventas_unidad_medida' => rand(0, 1),
            'ventas_subcuenta_asociada' => Str::random(10), */
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Familia::create(
            [
                'codigo' => Str::random(6),
                'descripcion_familia' => "Descripcion",
                'id_seccion' => 2,
                'unidad_medida' => Str::random(10),
                'texto_etiqueta' => 'REJ',
                'contador' => rand(1, 100),
                'descuento' => rand(0, 100) / 10,
                //'imprimir_ventas' => rand(0, 1),
                /* 'compras_unidad_medida' => rand(0, 1),
                'compras_has_metal' => rand(0, 1),
                'compras_subcuenta_asociada' => Str::random(10),
                'ventas_unidad_medida' => rand(0, 1),
                'ventas_subcuenta_asociada' => Str::random(10), */
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        Familia::create([
            'codigo' => Str::random(6),
            'descripcion_familia' => "Descripcion",
            'id_seccion' => 4,
            'unidad_medida' => Str::random(10),
            'texto_etiqueta' => 'PLA',
            'contador' => rand(1, 100),
            'descuento' => rand(0, 100) / 10,
            //'imprimir_ventas' => rand(0, 1),
            /* 'compras_unidad_medida' => rand(0, 1),
            'compras_has_metal' => rand(0, 1),
            'compras_subcuenta_asociada' => Str::random(10),
            'ventas_unidad_medida' => rand(0, 1),
            'ventas_subcuenta_asociada' => Str::random(10), */
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
