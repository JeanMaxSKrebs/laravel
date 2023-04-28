<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora');
            $table->decimal('valor', 10, 2);
            $table->unsignedBigInteger('id_salao');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_salao')->references('id')->on('saloes');
            $table->foreign('id_cliente')->references('id')->on('clientes');
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
        Schema::dropIfExists('reservas');
    }
}