<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
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
            'cpf' => $faker->randomNumber(11, false),
            'idade' => $faker->numberBetween(18, 60),
            'email' => $faker->email(),
            'telefone' => $faker->phoneNumber(),
            'mensagens' => $faker->paragraphs($nb = 3, $asText = true),
            'foto_perfil' => $faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
