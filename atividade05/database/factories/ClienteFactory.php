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
            'nome' => $this->faker->text(30),
            'cpf' => $this->faker->randomNumber(11, false),
            'idade' => $this->faker->numberBetween(18, 60),
            'email' => $this->faker->email(),
            'telefone' => $this->faker->phoneNumber(),
            'mensagens' => $this->faker->paragraphs($nb = 3, $asText = true),
            'foto_perfil' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
