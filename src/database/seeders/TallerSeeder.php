<?php

namespace Database\Seeders;

use App\Models\Taller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TallerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Taller::create(
            [
                'nombre' => 'Relojeria',
                'descripcion' => "Descripcion de la Joyeria",
                'id_empresa' => 1
            ]
        );
        Taller::create([
            'nombre' => 'Joyeria',
            'id_empresa' => 1
        ]);
    }
}
