<?php

namespace Database\Factories;

use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contrato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'descricao' => $this->faker->sentence,
            'data_inicio' => $this->faker->date,
            'data_fim' => $this->faker->date,
            'valor_contrato' => $this->faker->randomFloat(2, 0, 1500),
        ];
    }
}
