<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TransportStatus;
use App\Models\Transport;
use App\Models\OriginDetail;
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
            'id_transport'=> $this->faker->numberBetween($min = 1, $max = 25),
            'id_origindetail' => $this->faker->numberBetween($min = 1, $max = 25),
            'estado' => "En Transito",
            'selectivo' => $this->faker->numberBetween($min = 0, $max = 2),
        ];
    }
}
