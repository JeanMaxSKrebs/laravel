<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_hora' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'valor' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            // 'salao_id' => $faker->numberBetween($min = 1, $max = 100),
            // 'cliente_id' => $faker->numberBetween($min = 1, $max = 100),
        ];        
    }
}
