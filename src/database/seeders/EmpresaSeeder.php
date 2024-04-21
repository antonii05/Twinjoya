<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empresa::create([
            'numero_sucursal' => '1',
            'razon_social' => 'AB Joyeros',
            'direccion'=> 'Plaza Constitucion 1',
            'pais' => 'España',
        ]);
    }
}
