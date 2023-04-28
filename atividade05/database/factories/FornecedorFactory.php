<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nome" => fake()->company(),
            "cnpj" => fake()->cnpj(),
            "email" => fake()->companyEmail(),
            "estado_id" => fake()->numberBetween(1, 27),
            "telefone" => fake()->cellphoneNumber(),
            "endereco" => fake()->sentence(3) . ' nr:' . fake()->randomNumber(4, false)
        ];
    }
}
