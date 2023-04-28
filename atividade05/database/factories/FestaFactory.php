<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FestaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => fake()->text(30),
            'duracao' => fake()->time($format = 'H:i', $max = 'now'),
            'num_convidados' => fake()->numberBetween($min = 10, $max = 100),
            'reserva_id' => fake()->randomNumber(),
        ];
    }
}
