<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePagoAgendamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pago_agendamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agendamiento_id')->comment('Aqui se asocia con el agendamiento');
            $table->foreignId('forma_pago_id')->comment('Aqui se asocia con la forma de pago');
            $table->foreignId('estado_pago_id')->comment('Aqui asociamos con el estado del pago del servicio');
            $table->integer('monto')->comment('Seria el monto que ha depositado');
            $table->string('transaccion_id')->comment('Aqui se registra el id de la transaccion');
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
        Schema::dropIfExists('detalle_pago_agendamientos');
    }
}
