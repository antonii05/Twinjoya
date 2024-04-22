<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellidos' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'direccion' => fake()->streetName(),
            'cod_postal' => 37300,
            'provincia' => fake()->city(),
            'pais' => fake()->country(),
            'telefono' => fake()->phoneNumber(),
            'nif' => Cliente::generarNifAleatorio(),
            'activo' => fake()->boolean(),
            'tipo_cliente' => fake()->numberBetween(0,3),
            'fecha_alta' => fake()->dateTime(now()),
            'id_usuario' => fake()->numberBetween(1,15),
            'id_empresa' => 1,
        ];
    }
}
