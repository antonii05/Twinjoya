<?php

namespace Database\Seeders;

use App\Models\Reparacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Reparacion::create([
                'id_empresa' => 1,
                'fecha_recogida' => now(),
                'id_cliente' => random_int(1, 10),
                'id_proveedor' => random_int(1,10),
                'id_taller' => random_int(1,2),
                'fecha_prevista' => now()->addDays(random_int(1, 15)), // Ejemplo de fecha prevista aleatoria
                'unidades' => random_int(1, 5), // Cambia los rangos según tu caso o déjalo como null
                'importe' => rand(100, 1000) / 10, // Ejemplo de importe aleatorio
                'descripcion' => 'Descripción del artículo ' . ($i + 1),
                'reparacion_a_realizar' => "Reparacion".$i,
                'numero_serie' => 'Número de serie ' . ($i+ 1), // Puedes generar un número de serie o dejarlo como null
                'presupuesto_taller' => rand(100, 1000) / 10, // Ejemplo de presupuesto de taller aleatorio
                'id_usuario' => 1,
                'terminada' => rand(0,1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
