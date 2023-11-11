<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OriginDetailFactory extends Factory
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
            'id_pais'=> $this->faker->numberBetween($min = 1, $max = 20),
            'id_empresa' => $this->faker->numberBetween($min = 1, $max = 20),
        ];
    }
}
