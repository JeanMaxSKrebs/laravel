<?php

use App\Models\Pagamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagamentoFactory extends Factory
{
    protected $model = Pagamento::class;

    public function definition()
    {
        $valor = $this->faker->randomFloat(2, 500, 2000);
        $desconto = $this->faker->randomElement([5, 10, 15, 20]);
        $valorTotalcomDesconto = $valor - ($desconto / 100) * $valor;
        $valorCalcao = $valorTotalcomDesconto / 10;

        return [
            'tipo' => $this->faker->word,
            'reserva_id' => function () {
                return factory(App\Models\Reserva::class)->create()->id;
            },
            'data_vencimento' => now()->addDays($this->faker->numberBetween(1, 30)),
            'data_pagamento' => now()->subDays($this->faker->numberBetween(1, 30)),
            'valor_total' => $valorTotalcomDesconto,
            'valor_calcao' => $valorCalcao,
            'desconto' => $desconto,
            'tipo_desconto' => $this->faker->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
