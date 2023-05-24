<?php

namespace Database\Seeders;

use App\Models\Pagamento;
use App\Models\Reserva;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PagamentosTableSeeder extends Seeder
{
    public function run()
    {
        try {
            $quantidadeReservas = 250; // Defina aqui a quantidade de reservas com as quais os pagamentos terão relação

            $reservas = Reserva::inRandomOrder()->limit($quantidadeReservas)->get();

            $pagamentos = [];

            foreach ($reservas as $reserva) {
                $valor = rand(500, 2000);
                $desconto = rand(1, 4) * 5; // Gera um número aleatório entre 1 e 4 e multiplica por 5(logo os descontos são de (5, 10, 15, 20) % )
                $valorTotalcomDesconto = $valor - ($desconto / 100) * $valor;
                $valorCalcao = $valorTotalcomDesconto/10;


                $dataVencimento = now()->addDays(rand(1, 30));
                $dataPagamento = $dataVencimento->copy()->addDays(rand(-10, 10));
                

                $pagamentos[] = [
                    'tipo' => 'Tipo de Pagamento',
                    'reserva_id' => $reserva->id,
                    'data_vencimento' => $dataVencimento,
                    'data_pagamento' => $dataPagamento,
                    'valor_total' => $valorTotalcomDesconto,
                    'valor_calcao' => $valorCalcao,
                    'desconto' => $desconto,
                    'tipo_desconto' => 'Tipo de Desconto',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Pagamento::insert($pagamentos);

            Log::channel('stderr')->info("Pagamentos inseridos com sucesso!");
            print_r(Pagamento::all()->pluck('id'));
        } catch (Exception $error) {
            throw new Exception("Erro ao processar o seed de Pagamentos!\n {$error->getMessage()}");
        }
    }
}
