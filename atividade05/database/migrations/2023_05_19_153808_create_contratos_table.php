<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->decimal('valor_contrato', 10, 2);
            $table->unsignedBigInteger('pagamento_id');
            $table->unsignedBigInteger('reserva_id');
            $table->unsignedBigInteger('festa_id');
            $table->timestamps();

            $table->foreign('pagamento_id')->references('id')->on('pagamentos');
            $table->foreign('reserva_id')->references('id')->on('reservas');
            $table->foreign('festa_id')->references('id')->on('festas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
