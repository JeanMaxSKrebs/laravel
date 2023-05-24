<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            if (Cliente::all()->count()) {
                Log::channel('stderr')->info("O banco já possui clientes cadastrados!");
                print_r(Cliente::all()->pluck('id', 'email'));
                return;
            }
            $clientes = [
                [
                    'Cpf' => '11111111111',
                    'Idade' => 30,
                    'Email' => 'cliente1@example.com',
                    'Telefone' => '(11) 1111-1111',
                    'Mensagens' => json_encode(['lindo','bonito']),
                    'Foto_perfil' => 'https://exemplo.com/foto1.jpg'
                ],
                [
                    'Cpf' => '22222222222',
                    'Idade' => 25,
                    'Email' => 'cliente2@example.com',
                    'Telefone' => '(22) 2222-2222',
                    'Mensagens' => json_encode(['lindo','bonito']),
                    'Foto_perfil' => 'https://exemplo.com/foto2.jpg'
                ],
                [
                    'Cpf' => '33333333333',
                    'Idade' => 40,
                    'Email' => 'cliente3@example.com',
                    'Telefone' => '(33) 3333-3333',
                    'Mensagens' => json_encode(['lindo','bonito']),
                    'Foto_perfil' => 'https://exemplo.com/foto3.jpg'
                ]
            ];

            $listclientes = [];
            foreach ($clientes as $cliente) {
                $listclientes[] = [
                    'cpf' => $cliente['Cpf'],
                    'idade' => $cliente['Idade'],
                    'email' => $cliente['Email'],
                    'telefone' => $cliente['Telefone'],
                    'mensagens' => $cliente['Mensagens'],
                    'foto_perfil' => $cliente['Foto_perfil']
                ];
            }

            if (!Cliente::insert($listclientes)) {
                throw new \Exception("Erro ao inserir clientes!", 1);
            }

            Log::channel('stderr')->info("Clientes inseridos com sucesso!");
            print_r(Cliente::all()->pluck('id', 'email'));
        } catch (\Exception $error) {
            throw new \Exception("Erro ao processar o seed de clientes!\n {$error->getMessage()}");
        }
    }
}
