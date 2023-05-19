<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contratos = [
            [
                'descricao' => 'Contrato 1',
                'data_inicio' => '2023-01-01',
                'data_fim' => '2023-12-31',
                'valor_contrato' => 1000.00,
                'pagamento_id' => 1,
                'reserva_id' => 1,
                'festa_id' => 1,
            ],
            [
                'descricao' => 'Contrato 2',
                'data_inicio' => '2023-02-01',
                'data_fim' => '2023-03-31',
                'valor_contrato' => 1500.00,
                'pagamento_id' => 2,
                'reserva_id' => 2,
                'festa_id' => 2,
            ],
            [
                'descricao' => 'Contrato 3',
                'data_inicio' => '2023-04-01',
                'data_fim' => '2023-05-31',
                'valor_contrato' => 2000.00,
                'pagamento_id' => 3,
                'reserva_id' => 3,
                'festa_id' => 3,
            ],
        ];

        foreach ($contratos as $contrato) {
            Contrato::create($contrato);
        }
    }
}
