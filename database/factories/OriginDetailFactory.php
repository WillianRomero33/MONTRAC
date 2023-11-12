<?php

namespace Database\Factories;

use App\Models\OriginDetail;
use App\Models\Country;
use App\Models\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OriginDetailFactory extends Factory
{
    protected $model = OriginDetail::class;
    public function definition(): array
    {
        return [
            'id_pais'=> $this->faker->numberBetween($min = 1, $max = 24),
            'id_empresa' => $this->faker->numberBetween($min = 1, $max = 24),
            // Otros campos de la tabla Origin
        ];
    }
}
