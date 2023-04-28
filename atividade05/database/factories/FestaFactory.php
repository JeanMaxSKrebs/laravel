<?php

namespace Database\Factories;

use Faker\Factory as Faker;
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
        $faker = Faker::create();
        return [
            'nome' => $faker->text(30),
            'duracao' => $faker->time($format = 'H:i', $max = 'now'),
            'num_convidados' => $faker->numberBetween($min = 10, $max = 100),
            'reserva_id' => $faker->randomNumber(),
        ];
    }
}
