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
            'nome' => $this->faker->text(30),
            'duracao' => $this->faker->time($format = 'H:i', $max = 'now'),
            'num_convidados' => $this->faker->numberBetween($min = 10, $max = 100),
            'reserva_id' => $this->faker->randomNumber(),
        ];
    }
}
