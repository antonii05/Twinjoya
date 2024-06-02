<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\User;
use Database\Factories\ProveedorFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(TallerSeeder::class);
        User::factory()->times(15)->create();
        Cliente::factory()->times(50)->create();
        Proveedor::factory()->times(10)->create();
        $this->call(SeccionSeeder::class);
        $this->call(FamiliasSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(ReparacionSeeder::class);
        $this->call(FacturasProveedoresSeeder::class);
        $this->call(LineaProveedorSeeder::class);
    }
}