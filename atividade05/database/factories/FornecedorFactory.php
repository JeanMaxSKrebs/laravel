<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\pt_BR\Company;


class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker = Faker::create();
        $this->faker->addProvider(new Company($this->faker));
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