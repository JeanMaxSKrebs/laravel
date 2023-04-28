<?php

namespace Database\Factories;

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
        return [
            'cliente_id' => fake()->randomNumber(),
            'reserva_id' => fake()->randomNumber(),
            'valor_total' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'data_pagamento' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'data_vencimento' => fake()->date($format = 'Y-m-d', $max = '+1 year'),
        ];        
    }
}
