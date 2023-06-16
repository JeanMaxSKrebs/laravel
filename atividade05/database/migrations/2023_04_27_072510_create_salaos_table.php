<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saloes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('cnpj');
            $table->string('endereco');
            $table->string('cidade');
            $table->text('descricao');
            $table->integer('capacidade');
            $table->string('logo')->nullable();;
            $table->json('imagens')->nullable();;
            $table->json('mensagens')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaos');
    }
}