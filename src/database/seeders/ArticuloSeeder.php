<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $unidades = ['cm', 'mm'];

        for ($i = 1; $i <= 20; $i++) { // Cambia el número según la cantidad de datos que desees generar
            Articulo::create([
                'codigo' => 'COD' . $i,
                'descripcion' => 'Descripción del artículo ' . $i,
                'matricula' => 'Matrícula ' . $i,
                'medida' => rand(1, 100), // Genera un número aleatorio para la medida
                'tipo_medida' => fake()->randomElement($unidades),
                'id_familia' => rand(1, 5), // Reemplaza 5 por el número total de opciones de familia
                'id_proveedor' => rand(1, 10), // Reemplaza 10 por el número total de proveedores
                'tipo_compra' => 'Tipo de compra ' . $i,
                'barcode' => 'Barcode ' . $i,
                'precio_venta' => rand(10, 100), // Genera un precio aleatorio
                'observaciones' => "Esto son las observaciones del articulo " .$i,
                'articulo_en_uso' => rand(0, 1), // Genera 0 o 1 aleatorio para articulo_obsoleto
                'id_usuario' => rand(0,5),
                'id_empresa' => 1,
                'id_lineaFacturaProveedor' => 1,
            ]);
        }
    }
}
