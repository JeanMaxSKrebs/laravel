<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SalaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => fake()->company(),
            'cnpj' => fake()->numerify('##.###.###/####-##'),
            'endereco' => fake()->address(),
            'cidade' => fake()->city(),
            'descricao' => fake()->text(),
            'capacidade' => fake()->numberBetween($min = 50, $max = 500),
            'imagens' => [
                fake()->imageUrl($width = 640, $height = 480),
                fake()->imageUrl($width = 640, $height = 480),
                fake()->imageUrl($width = 640, $height = 480)
            ],
            'logo' => fake()->imageUrl($width = 200, $height = 200),
            'mensagens' => fake()->paragraphs($nb = 3, $asText = true)
        ];
        
    }
}
