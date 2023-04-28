<?php

namespace Database\Factories;

use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagamentoFactory extends Factory
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
            'cliente_id' => $faker->randomNumber(),
            'reserva_id' => $faker->randomNumber(),
            'valor_total' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'data_pagamento' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'data_vencimento' => $faker->date($format = 'Y-m-d', $max = '+1 year'),
        ];        
    }
}
