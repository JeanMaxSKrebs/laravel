<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nome" => $this->faker->text(30),
            "descricao" => $this->faker->sentence(10),
            "preco" => $this->faker->randomFloat(2, 100, 10000),
            "qtd_estoque" => $this->faker->randomNumber(3, false),
            "importado" => $this->faker->numberBetween(0, 1)
        ];
    }
}