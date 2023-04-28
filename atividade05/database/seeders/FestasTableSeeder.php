<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('festas')->insert([
            [
                'cliente_id' => 1,
                'salao_id' => 1,
                'tema' => 'Festa de Aniversário',
                'data' => '2023-07-01',
                'hora_inicio' => '18:00',
                'hora_fim' => '22:00',
                'quantidade_convidados' => 50,
            ],
            [
                'cliente_id' => 2,
                'salao_id' => 2,
                'tema' => 'Festa de Casamento',
                'data' => '2023-08-01',
                'hora_inicio' => '20:00',
                'hora_fim' => '02:00',
                'quantidade_convidados' => 100,
            ],
            // Adicione quantas festas desejar
        ]);
    }
}
