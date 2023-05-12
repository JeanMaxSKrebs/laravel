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
            'nome' =>  $this->faker->company(),
            'cnpj' =>  $this->faker->numerify('##.###.###/####-##'),
            'endereco' =>  $this->faker->address(),
            'cidade' =>  $this->faker->city(),
            'descricao' =>  $this->faker->text(),
            'capacidade' =>  $this->faker->numberBetween($min = 50, $max = 500),
            'imagens' => [
                 $this->faker->imageUrl($width = 640, $height = 480),
                 $this->faker->imageUrl($width = 640, $height = 480),
                 $this->faker->imageUrl($width = 640, $height = 480)
            ],
            'logo' =>  $this->faker->imageUrl($width = 200, $height = 200),
            'mensagens' =>  $this->faker->paragraphs($nb = 3, $asText = true)
        ];
        
    }
}
