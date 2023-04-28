<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserva;
use App\Models\Festa;
use App\Models\Cliente;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criação das Festas
        $festa1 = Festa::create([
            'nome' => 'Festa de Aniversário',
            'data' => '2023-05-15',
            'horario' => '19:00:00',
            'descricao' => 'Festa de aniversário de 18 anos'
        ]);

        $festa2 = Festa::create([
            'nome' => 'Festa de Casamento',
            'data' => '2023-06-25',
            'horario' => '20:00:00',
            'descricao' => 'Festa de casamento de João e Maria'
        ]);

        // Criação dos Clientes
        $cliente1 = Cliente::create([
            'nome' => 'João',
            'email' => 'joao@gmail.com',
            'telefone' => '(11) 99999-9999',
            'endereco' => 'Rua 1, 123'
        ]);

        $cliente2 = Cliente::create([
            'nome' => 'Maria',
            'email' => 'maria@gmail.com',
            'telefone' => '(11) 88888-8888',
            'endereco' => 'Rua 2, 456'
        ]);

        // Criação das Reservas
        Reserva::create([
            'festa_id' => $festa1->id,
            'cliente_id' => $cliente1->id,
            'data_reserva' => '2023-04-28',
            'valor' => 1500.00
        ]);

        Reserva::create([
            'festa_id' => $festa2->id,
            'cliente_id' => $cliente2->id,
            'data_reserva' => '2023-04-29',
            'valor' => 2500.00
        ]);

        // Adicione quantas Reservas desejar
    }
}
