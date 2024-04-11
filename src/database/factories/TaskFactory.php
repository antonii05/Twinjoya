<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->text(),
            'descripcion' => fake()->paragraph(),
            'fecha_limite' => fake()->dateTimeThisDecade(),
            // se le envia el chance de que sea true -> (1 o 0) 
            'archivado' => fake()->boolean(),
            'id_usuario' => fake()->numberBetween(2,13),
            'id_categoria' => fake()->numberBetween(1,5),
            'id_grupo' => fake()->numberBetween(1,5),
            'id_carta' => fake()->numberBetween(1,5),
        ];
    }
}
