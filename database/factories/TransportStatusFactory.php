<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransportStatus>
 */
class TransportStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id_transport'=> $this->faker->numberBetween($min = 1, $max = 20),
            'id_origindetail' => $this->faker->numberBetween($min = 1, $max = 20),
            'estado' => "En Transito",
            'inicio_transito' => now(),
            // 'selectivo' => $this->faker->numberBetween($min = 0, $max = 2),
        ];
    }
}
