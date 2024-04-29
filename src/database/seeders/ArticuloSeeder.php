<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) { // Cambia el número según la cantidad de datos que desees generar
            Articulo::create([
                'codigo' => 'COD' . $i,
                'descripcion' => 'Descripción del artículo ' . $i,
                'matricula' => 'Matrícula ' . $i,
                'medida' => rand(1, 100), // Genera un número aleatorio para la medida
                'id_familia' => rand(1, 5), // Reemplaza 5 por el número total de opciones de familia
                'id_proveedor' => rand(1, 10), // Reemplaza 10 por el número total de proveedores
                'tipo_compra' => 'Tipo de compra ' . $i,
                'barcode' => 'Barcode ' . $i,
                'precio_venta' => rand(10, 100), // Genera un precio aleatorio
                'compras_unidad_medida' => rand(0, 1), // Genera 0 o 1 aleatorio para compras_unidad_medida
                'ventas_unidad_medida' => rand(0, 1), // Genera 0 o 1 aleatorio para ventas_unidad_medida
                'articulo_obsoleto' => rand(0, 1), // Genera 0 o 1 aleatorio para articulo_obsoleto
            ]);
        }
    }
}
