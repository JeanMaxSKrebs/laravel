<?php

namespace Database\Seeders;
use DateTime;

use App\Models\Reserva;
use App\Models\Salao;
use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            if (Reserva::all()->count()) {
                Log::channel('stderr')->info("O banco já possui reservas cadastradas!");
                print_r(Reserva::all()->pluck('id_salao', 'id_cliente'));
                return;
            }
            // Seleciona todos os salões e clientes
            $saloes = Salao::all();
            $clientes = Cliente::all();

            // Cria 50 reservas aleatórias
            for ($i = 0; $i < 50; $i++) {
                $salao = $saloes->random();
                $cliente = $clientes->random();
                $data_hora = $this->geraDataHoraAleatoria();
                $valor = mt_rand(50, 500);

                Reserva::create([
                    'data_hora' => $data_hora,
                    'valor' => $valor,
                    'id_salao' => $salao->id,
                    'id_cliente' => $cliente->id,
                ]);
            }

            Log::channel('stderr')->info("reservas inseridas com sucesso!");
            print_r(Reserva::all()->pluck('id_salao', 'id_cliente'));
        } catch (\Exception $error) {
            throw new \Exception("Erro ao processar o seed de salaos!\n {$error->getMessage()}");
        }
    }

    private function geraDataHoraAleatoria()
    {
        // Gera uma data aleatória dentro dos próximos 6 meses
        $data = new DateTime();
        $data->modify('+' . mt_rand(0, 180) . ' days');
        $data_hora = $data->format('Y-m-d ');

        // Gera uma hora aleatória entre 9:00 e 20:00
        $hora = mt_rand(9, 20);
        $minuto = mt_rand(0, 59);
        $segundo = mt_rand(0, 59);
        $data_hora .= sprintf('%02d:%02d:%02d', $hora, $minuto, $segundo);

        return $data_hora;
    }
}