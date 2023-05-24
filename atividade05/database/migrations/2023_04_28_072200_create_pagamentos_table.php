<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->unsignedBigInteger('reserva_id');
            $table->date('data_vencimento');
            $table->date('data_pagamento');
            $table->decimal('valor_total', 10, 2);
            $table->decimal('valor_calcao', 10, 2);
            $table->integer('desconto');
            $table->string('tipo_desconto');
            $table->timestamps();

            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}