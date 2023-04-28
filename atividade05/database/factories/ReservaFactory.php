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
            'data_hora' => fake()->dateTimeBetween('-1 year', 'now'),
            'valor' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'id_salao' => fake()->numberBetween($min = 1, $max = 100),
            'id_cliente' => fake()->numberBetween($min = 1, $max = 1000),
        ];        
    }
}
