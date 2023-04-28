<?php

namespace Database\Seeders;

use App\Models\Salao;
use Illuminate\Database\Seeder;

class SaloesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salao::create([
            'nome' => 'Salão A',
            'endereco' => 'Rua 1, 123',
            'capacidade' => 100,
        ]);
        
        Salao::create([
            'nome' => 'Salão B',
            'endereco' => 'Rua 2, 456',
            'capacidade' => 200,
        ]);
    }
}
