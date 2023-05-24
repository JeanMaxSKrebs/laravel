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
            print_r('teste1');
            print_r(Reserva::all()->count());
            print_r('teste2');
            if (Reserva::all()->count()) {
                print_r('teste3');
                Log::channel('stderr')->info("O banco já possui reservas cadastradas!");
                print_r('teste4');
                print_r(Reserva::all()->pluck('salao_id', 'cliente_id'));
                print_r('teste5');
                return;
            }
            // Seleciona todos os salões e clientes
            $saloes = Salao::all();
            $clientes = Cliente::all();

            // Cria 50 reservas aleatórias
            for ($i = 0; $i < 500; $i++) {
                $salao = $saloes->random();
                $cliente = $clientes->random();
                $data_hora = $this->geraDataHoraAleatoria();
                $valor = mt_rand(50, 500);

                Reserva::create([
                    'data_hora' => $data_hora,
                    'valor' => $valor,
                    'salao_id' => $salao->id,
                    'cliente_id' => $cliente->id,
                ]);
            }

            Log::channel('stderr')->info("reservas inseridas com sucesso!");
            print_r(Reserva::all()->pluck('salao_id', 'cliente_id'));
        } catch (\Exception $error) {
            throw new \Exception("Erro ao processar o seed de reservas!\n {$error->getMessage()}");
        }
    }

    private function geraDataHoraAleatoria()
    {
        $dataInicial = new DateTime();
        $dataInicial->modify('-1 year'); // Define a data inicial como 1 ano atrás
    
        $dataFinal = new DateTime();
        $dataFinal->modify('+3 years'); // Define a data final como 3 anos à frente
    
        $intervalo = $dataInicial->diff($dataFinal); // Calcula o intervalo entre as datas
    
        $diasTotais = $intervalo->days; // Obtém o total de dias entre as datas
    
        // Gera um número aleatório de dias dentro do intervalo
        $diasAleatorios = mt_rand(0, $diasTotais);
    
        $data = clone $dataInicial; // Cria uma cópia da data inicial
        $data->modify('+' . $diasAleatorios . ' days'); // Adiciona os dias aleatórios à data inicial
    
        $data_hora = $data->format('Y-m-d ');
    
        // Gera uma hora aleatória entre 9:00 e 20:00
        $hora = mt_rand(9, 20);
        $minuto = mt_rand(0, 59);
        $segundo = mt_rand(0, 59);
        $data_hora .= sprintf('%02d:%02d:%02d', $hora, $minuto, $segundo);
    
        return $data_hora;
    }
    
}