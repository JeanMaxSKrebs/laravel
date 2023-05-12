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
            "nome" => $this->faker->company(),
            "cnpj" =>  $this->faker->cnpj,
            "email" => $this->faker->companyEmail(),
            "estado_id" => $this->faker->numberBetween(1, 27),
            "telefone" => $this->faker->phoneNumber,
            "endereco" => $this->faker->sentence(3) . ' nr:' . $this->faker->randomNumber(4, false)
        ];
    }
}