<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->regexify('[A-Za-z0-9]{6}'),
            'nombre_fiscal' => fake()->company(),
            'direccion' => fake()->streetName(),
            'cod_postal' => 37300,
            'provincia' => fake()->city(),
            'pais' => fake()->country(),
            'telefono1' => fake()->phoneNumber(),
            'telefono2' => fake()->phoneNumber(),
            'cif' => "12345678Z",
            'email' => fake()->unique()->safeEmail(),
            'web' => fake()->url(),
            'activo' => fake()->boolean(),
            'id_empresa' => 1,
            'id_usuario' => fake()->numberBetween(1, 15),
            'fecha_alta' => fake()->dateTime(now()),
            'fecha_modificacion' => fake()->dateTime(now()),
        ];
    }
}
