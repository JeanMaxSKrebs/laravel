<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

	      $seedRegiao = new RegiaoSeeder();
        $seedRegiao->run();

        (new EstadoSeeder)->run();


        (new SaloesTableSeeder)->run();
        (new ClientesTableSeeder)->run();
        (new ReservasTableSeeder)->run();
        (new PagamentosTableSeeder)->run();
        // (new FestasTableSeeder)->run();
        // (new PagamentosTableSeeder)->run();

        $faker = Faker::create();

        \App\Models\Fornecedor::factory($faker->randomNumber(2))
                ->hasProdutos($faker->randomNumber(1))
                ->create();

    }
}
