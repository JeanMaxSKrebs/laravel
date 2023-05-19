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
                'contrato_id' => 1,
                'nome' => 'Festa de Aniversário',
                'data' => '2023-07-01',
                'duracao' => '4:00',
                'quantidade_convidados' => 50,
            ],
            [
                'contrato_id' => 2,
                'nome' => 'Festa de Casamento',
                'data' => '2023-08-01',
                'duracao' => '5:00',
                'quantidade_convidados' => 100,
            ],
        ]);
    }
}
