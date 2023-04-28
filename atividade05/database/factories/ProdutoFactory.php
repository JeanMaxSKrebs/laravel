<?php

namespace Database\Factories;

use Faker\Factory as Faker;
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
        $faker = Faker::create();
        return [
            "nome" => $faker->text(30),
            "descricao" => $faker->sentence(10),
            "preco" => $faker->randomFloat(2, 100, 10000),
            "qtd_estoque" => $faker->randomNumber(3, false),
            "importado" => $faker->numberBetween(0, 1)
        ];
    }
}