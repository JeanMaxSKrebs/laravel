<?php

namespace Database\Seeders;

use App\Models\Salao;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class SaloesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            if (Salao::all()->count()) {
                Log::channel('stderr')->info("O banco já possui salaos cadastrados!");
                print_r(Salao::all()->pluck('id', 'nome'));
                return;
            }
            $jsonUrl = [
                [
                    'Cnpj' => '123456789',
                    'Nome' => 'Salão 1',
                    'Endereco' => 'Rua A, 123',
                    'Cidade' => 'São Paulo',
                    'Descricao' => 'Salão de festas',
                    'Capacidade' => 100,
                    'Logo' => 'https://exemplo.com/logo.jpg',
                    'Imagens' => json_encode([
                        'https://exemplo.com/imagem1.jpg',
                        'https://exemplo.com/imagem2.jpg'
                    ]),
                    'Mensagens' => json_encode(['lindo','bonito'])
                ],
                [
                    'Cnpj' => '987654321',
                    'Nome' => 'Salão 2',
                    'Endereco' => 'Rua B, 456',
                    'Cidade' => 'Rio de Janeiro',
                    'Descricao' => 'Salão de eventos',
                    'Capacidade' => 200,
                    'Logo' => 'https://exemplo.com/logo2.jpg',
                    'Imagens' => json_encode([
                        'https://exemplo.com/imagem3.jpg',
                        'https://exemplo.com/imagem4.jpg'
                    ]),
                    'Mensagens' => json_encode(['lindo','bonito'])
                ],
                [
                    'Cnpj' => '111111111',
                    'Nome' => 'Salão 3',
                    'Endereco' => 'Rua C, 789',
                    'Cidade' => 'Belo Horizonte',
                    'Descricao' => 'Salão de casamentos',
                    'Capacidade' => 300,
                    'Logo' => 'https://exemplo.com/logo3.jpg',
                    'Imagens' => json_encode([
                        'https://exemplo.com/imagem5.jpg',
                        'https://exemplo.com/imagem6.jpg'
                    ]),
                    'Mensagens' => json_encode(['lindo','bonito'])
                ],
                [
                    'Cnpj' => '222222222',
                    'Nome' => 'Salão 4',
                    'Endereco' => 'Rua D, 1011',
                    'Cidade' => 'Curitiba',
                    'Descricao' => 'Salão de conferências',
                    'Capacidade' => 400,
                    'Logo' => 'https://exemplo.com/logo4.jpg',
                    'Imagens' => json_encode([
                        'https://exemplo.com/imagem7.jpg',
                        'https://exemplo.com/imagem8.jpg'
                    ]),
                    'Mensagens' => json_encode(['lindo','bonito'])
                ],
                [
                    'Cnpj' => '333333333',
                    'Nome' => 'Salão 5',
                    'Endereco' => 'Rua E, 1213',
                    'Cidade' => 'Porto Alegre',
                    'Descricao' => 'Salão de reuniões',
                    'Capacidade' => 500,
                    'Logo' => 'https://exemplo.com/logo5.jpg',
                    'Imagens' => json_encode([
                        'https://exemplo.com/imagem9.jpg',
                        'https://exemplo.com/imagem10.jpg'
                    ]),
                    'Mensagens' => json_encode(['lindo','bonito'])
                ]
            ];

            $saloes = $jsonUrl;

            $listsaloes = [];
            foreach ($saloes as $salao)
                $listsaloes[] = [
                    'nome' => $salao['Nome'],
                    'cnpj' => $salao['Cnpj'],
                    'endereco' => $salao['Endereco'],
                    'cidade' => $salao['Cidade'],
                    'descricao' => $salao['Descricao'],
                    'capacidade' => $salao['Capacidade'],
                    'logo' => $salao['Logo'],
                    'imagens' => $salao['Imagens'],
                    'mensagens' => $salao['Mensagens'],
                ];
                // print_r($listsaloes);


            if (!salao::insert($listsaloes))
                throw new \Exception("Erro ao inserir salaos!", 1);

            Log::channel('stderr')->info("salaos inseridos com sucesso!");
            print_r(salao::all()->pluck( 'id', 'nome'));
        } catch (\Exception $error) {
            throw new \Exception("Erro ao processar o seed de salaos!\n {$error->getMessage()}");
        }
    }
}