<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PagamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagamentos')->insert([
            [
                'reserva_id' => 1,
                'valor' => 500.00,
                'data_pagamento' => '2023-05-01',
                'descricao' => 'Pagamento referente à reserva do João'
            ],
            [
                'reserva_id' => 2,
                'valor' => 1000.00,
                'data_pagamento' => '2023-06-01',
                'descricao' => 'Pagamento referente à reserva da Maria'
            ],
        ]);
    }
}