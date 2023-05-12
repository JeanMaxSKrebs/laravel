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
            'cliente_id' => $this->faker->randomNumber(),
            'reserva_id' => $this->faker->randomNumber(),
            'valor_total' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'data_pagamento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'data_vencimento' => $this->faker->date($format = 'Y-m-d', $max = '+1 year'),
        ];        
    }
}
