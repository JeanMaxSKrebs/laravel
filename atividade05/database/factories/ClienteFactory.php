<?php

namespace Database\Factories;

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
        return [
            'nome' => fake()->text(30),
            'cpf' => fake()->randomNumber(11, false),
            'idade' => fake()->numberBetween(18, 60),
            'email' => fake()->email(),
            'telefone' => fake()->phoneNumber(),
            'mensagens' => fake()->paragraphs($nb = 3, $asText = true),
            'foto_perfil' => fake()->imageUrl($width = 640, $height = 480),
        ];
    }
}
