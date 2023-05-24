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
            $clienteCount = 20; // Defina o número de clientes desejado

            if (Cliente::count() >= $clienteCount) {
                Log::channel('stderr')->info("O banco já possui clientes cadastrados!");
                print_r(Cliente::all()->pluck('id', 'email'));
                return;
            }

            $listclientes = [];

            for ($i = 1; $i <= $clienteCount; $i++) {
                $listclientes[] = [
                    'nome' => "Cliente {$i}",
                    'cpf' => '1111111111' . $i,
                    'idade' => 30 + $i,
                    'email' => "cliente{$i}@example.com",
                    'telefone' => "(11) 1111-111{$i}",
                    'mensagens' => json_encode(['lindo', 'bonito']),
                    'foto_perfil' => "https://exemplo.com/foto{$i}.jpg"
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
