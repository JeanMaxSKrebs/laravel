<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            [
                'nome' => 'João Silva',
                'cpf' => '123.456.789-10',
                'email' => 'joao.silva@email.com',
                'telefone' => '(11) 99999-9999',
                'endereco' => 'Rua A, 123',
            ],
            [
                'nome' => 'Maria Souza',
                'cpf' => '987.654.321-10',
                'email' => 'maria.souza@email.com',
                'telefone' => '(11) 88888-8888',
                'endereco' => 'Rua B, 456',
            ],
            // Adicione quantos clientes desejar
        ]);
    }
}
