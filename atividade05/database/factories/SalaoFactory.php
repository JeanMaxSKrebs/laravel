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
            'nome' =>  $this->fake->company(),
            'cnpj' =>  $this->fake->numerify('##.###.###/####-##'),
            'endereco' =>  $this->fake->address(),
            'cidade' =>  $this->fake->city(),
            'descricao' =>  $this->fake->text(),
            'capacidade' =>  $this->fake->numberBetween($min = 50, $max = 500),
            'imagens' => [
                 $this->fake->imageUrl($width = 640, $height = 480),
                 $this->fake->imageUrl($width = 640, $height = 480),
                 $this->fake->imageUrl($width = 640, $height = 480)
            ],
            'logo' =>  $this->fake->imageUrl($width = 200, $height = 200),
            'mensagens' =>  $this->fake->paragraphs($nb = 3, $asText = true)
        ];
        
    }
}
